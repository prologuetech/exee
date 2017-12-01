<?php

namespace Prologuetech\Exee;

use React\EventLoop\Factory;
use React\Socket\ConnectionInterface;
use React\Socket\Connector;

class Client
{
	const TRANS_PREFIX = '0,';
	const TRANS_AFFIX = '99,""';
	const TRANS_SEPARATOR = ',';

	/**
	 * URI endpoint for socket connection
	 *
	 * @var string
	 */
	public $uri;

	/**
	 * React Event Loop
	 *
	 * @var \React\EventLoop\ExtEventLoop|\React\EventLoop\LibEventLoop|\React\EventLoop\LibEvLoop|\React\EventLoop\StreamSelectLoop
	 */
	public $eventLoop;

	/**
	 * React Socket connector
	 *
	 * @var Connector
	 */
	public $socketConnector;

	/**
	 * Optional transaction ID for multiple requests
	 *
	 * @var null|string
	 */
	public $transactionId;

	/**
	 * Transaction Type
	 *
	 * @var string
	 */
	public $transactionType;

	/**
	 * Computed transaction string
	 *
	 * @var string
	 */
	public $transactionString;

	/**
	 * Toggles transaction string reordering
	 *
	 * @var bool
	 */
	public $reorder = true;

	/**
	 * Current data model for our client
	 *
	 * @var Model|null
	 */
	public $model;

	/**
	 * Holds an array of our decoded transaction string
	 *
	 * @var array
	 */
	public $decodedTransaction = [];

	/**
	 * Client constructor.
	 *
	 * @param null|string $uri
	 * @param null|string $transactionId
	 */
	public function __construct($uri = null, $transactionId = null)
	{
		// Default our URI to localhost

		$this->uri = ($uri) ? $uri : 'localhost:80';

		// Create react event loop
		$this->eventLoop = Factory::create();

		// Prepare our socket connection
		$this->socketConnector = new Connector($this->eventLoop);

		// TODO: generate transaction ID on the fly for every new transaction call
		$this->transactionId = ($transactionId) ? $transactionId : 'General Transaction';
	}

	/**
	 * Push our transaction through our socket connection
	 */
	public function push()
	{
		// Make our connection
		$totalBuffer = '';
		$this->socketConnector->connect($this->uri)->then(function (ConnectionInterface $connection) use (&$totalBuffer) {
			// When we receive data, output it to our page and end

			$totalBuffer = '';
			$connection->on('data', function ($data) use (&$connection, &$totalBuffer) {
				// If we have a model, pass back decoded data

				$totalBuffer .= $data;

				//Looking for the termination sequence, if we have it we know we have received the entire response from Fedex Ship Manager Server
				if(strstr($totalBuffer, '"99,"')){
					if ($this->model instanceof Model) {
						preg_match_all('/([0-9-]+,"[^"]+)+/', $totalBuffer, $results);

						$finalAssoc = array();

						foreach ($results[0] AS $fieldString) {
							$explodedComma = explode(",", $fieldString);
							$fieldNumber = $explodedComma[0];
							$reflected = static::reflectFields($fieldNumber);
							$key = (!empty($reflected)) ? $reflected : $fieldNumber;
							$finalAssoc[$key] = substr($fieldString, strpos($fieldString, ",") + 2);
						}

						$this->model->setResponses($finalAssoc);
					}

					//Since we know this is the last chunk, close the connection
					$connection->close();

				}

			});




			// Write our transaction to our URI
			$connection->write($this->prepare($this->transactionString));
//			// Pipe the response back out
			$connection->pipe('');

			//Just in case it wasn't already closed, close it.
			$connection->close();
		});

		// Fire event loop and process
		$this->eventLoop->run();
	}

	/**
	 * Prepare our transaction string by wrapping it with our prefix/affix.
	 *
	 * @param string $transactionString
	 * @return string
	 */
	public function prepare($transactionString)
	{
		return static::TRANS_PREFIX . $transactionString . static::TRANS_AFFIX;
	}

	/**
	 * Transaction string wrapper
	 *
	 * @param string $transactionString
	 * @return string
	 */
	public static function wrapper($transactionString)
	{
		return '"' . $transactionString . '"';
	}

	/**
	 * Set our transaction type.
	 *
	 * @param $type
	 * @return $this
	 */
	public function setTransactionType($type)
	{
		// Set our transaction type
		$this->transactionType = $type;

		// Set our transaction ID based on type
		$this->setTransactionId($this->getTransactionIdFromType($type));

		// Add our transaction ID to our fields
		$this->addTransactionFields($type);

		// Ever onward
		return $this;
	}

	/**
	 * Set our transaction ID
	 *
	 * @param string $id
	 */
	public function setTransactionId($id)
	{
		$this->transactionId = $id;
	}

	/**
	 * Set our reorder toggle
	 *
	 * @param bool $bool
	 */
	public function setReorder($bool)
	{
		$this->reorder = $bool;
	}

	/**
	 * Return our fully qualified transaction string
	 *
	 * @return string
	 */
	public function getTransactionString()
	{
		return $this->prepare($this->transactionString);
	}

	/**
	 * Reflects our constant name from it's type
	 *
	 * @param string $type
	 * @return bool|string
	 * @throws \Exception
	 */
	public function getTransactionIdFromType($type)
	{
		// Reflect our transaction type class
		$reflect = new \ReflectionClass("Prologuetech\Exee\TransactionTypes");

		// Array our constant list
		$constants = $reflect->getConstants();

		// Find our result
		$id = array_search($type, $constants, true);

		// Use our default if no match was found
		if (empty($id)) {
			$id = $this->transactionId;
		}

		// Humane treatments
		return ucwords(strtolower(str_replace('_', ' ', $id)));
	}

	/**
	 * Reflects our constant name from it's type
	 *
	 * @param string $type
	 * @return bool|string
	 * @throws \Exception
	 */
	public static function reflectFields($type)
	{
		// Reflect our transaction type class
		$reflect = new \ReflectionClass("Prologuetech\Exee\FieldTypes";

		// Array our constant list
		$constants = $reflect->getConstants();

		// Find our result
		return array_search($type, $constants);
	}

	public function decode($string) {
		// Strip our prefix
		$string = str_replace(static::TRANS_PREFIX, '', $string);

		// Strip our affix
		$string = str_replace(static::TRANS_AFFIX, '', $string);

		// Our transaction type is special, pull it out
		$transactionType = substr($string, 0, 5);

		$columns = preg_split('/"([0-9]+),? (?)"/', $string, -1, PREG_SPLIT_DELIM_CAPTURE);


		foreach($columns as $value) {
			$this->decodedTransaction[static::reflectFields($value)] = $value;
		}

		return $this->decodedTransaction;
	}

	/**
	 * Convert a data model into a transaction string
	 *
	 * @param Model $data
	 * @param bool $withValidation
	 * @return $this
	 */
	public function with($model, $withValidation = true)
	{
		// Validate our model
		if ($withValidation) {
			$this->validateModel($model);
		}

		// Generate our transaction ID if the developer does not specify
		if (!$model->getAttribute(FieldTypes::CUSTOMER_TRANSACTION_ID)) {
			$model->setAttribute(FieldTypes::CUSTOMER_TRANSACTION_ID, $this->transactionId);
		}

		// Pull all attributes
		$data = $model->getAttributes();

		// Rerder unless disabled
		if ($this->reorder) {
			ksort($data);
		}

		// Store our model inside our client
		$this->model = $model;

		// Add our data to our transaction string
		$this->addTransactionFields($data);
		return $this;
	}

	/**
	 * Add a single or many transaction fields to our transaction string
	 *
	 * Note: Order is not important
	 *
	 * @param string|array $data
	 */
	public function addTransactionFields($data)
	{
		// Handle single string additions
		if (!is_array($data)) {
			$this->transactionString .= static::wrapper($data);
			return;
		}

		// Handle array of strings
		foreach ($data as $field => $value) {
			$this->transactionString .= $field . static::TRANS_SEPARATOR . static::wrapper($value);
		}

		return;
	}

	/**
	 * Call our model validate method
	 *
	 * @param Model $model
	 * @throws \Exception
	 */
	public function validateModel($model)
	{
		if (!$model instanceof Model) {
			throw new \Exception(__METHOD__ . ': Unknown model type.');
		}

		if ($model->validate($model->getAttributes())) {
			return true;
		}

		$missingFieldsString = implode(', ', $model->getMissingFields());

		throw new \Exception('Unable to validate ' . get_class($model) . ', missing required fields: ' . $missingFieldsString);
	}
}
