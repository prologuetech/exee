<?php
namespace Prologuetech\Exee;

use React\EventLoop\Factory;
use React\Socket\Connector;
use React\Socket\ConnectionInterface;

class Client {
	/**
	 * See Page 52 FedEx Ship Manager Server Developer Guide, 2017
	 */
	const FIELD_CUSTOMER_TRANSACTION_ID = 1;
	const FIELD_RECIPIENT_COMPANY = 11;
	const FIELD_RECIPIENT_ADDRESS_1 = 13;
	const FIELD_PAY_TYPE = 23;
	const FIELD_RECIPIENT_COUNTRY = 50;
	const UNKNOWN_117 = 117;
	const FIELD_END = 99;

	const TRANS_SERVICE_AVAILABILITY = "019";
	const TRANS_GLOBAL_SHIP_REQUEST = "020";

	public $target;
	public $loop;
	public $connector;
	public $transactionId;
	public $transactionType;
	public $transactionString;

	public function __construct($target = null, $transactionId = null)
	{
		$this->target = $target ?? 'localhost:80';
		$this->loop = Factory::create();
		$this->connector = new Connector($this->loop);

		// TODO: generate transaction ID on the fly for every new transaction call
		//$this->transactionId = $transactionId ?? 'prologue_';
	}

	public function connect() {
		$this->connector->connect($this->target)->then(function (ConnectionInterface $connection) {
			$connection->on('data', function ($data) use ($connection) {
				echo $data;
				$connection->close();
			});

			$connection->write($this->tmpWrap($this->transactionString));
			$connection->pipe();
			$connection->close();
		}, 'printf');

		$this->loop->run();
	}

	public function tmpWrap($string) {
		return '0,'.$string.static::FIELD_END.',""';
	}

	public function transaction($type) {
		$this->transactionType = $type;

		$this->transactionString = '"'.$type.'"';
		return $this;
	}

	/**
	 * Wrapper
	 * @param array $data
	 * @return $this
	 */
	public function fields($data) {
		$this->addTransactionFields($data);
		return $this;
	}

	public function addTransactionFields($data) {
		foreach($data as $field => $value) {
			if(!empty($this->transactionString)) {
				$this->transactionString .= ''.$field.',"'.$value.'"';
			} else {
				$this->transactionString = $field.',"'.$value.'"';
			}
		}
	}
}
