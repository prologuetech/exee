<?php

namespace Prologuetech\Exee;

class Model
{
	/**
	 * Model attributes
	 *
	 * @var array
	 */
	protected $attributes = [];

	/**
	 * Model responses
	 *
	 * @var array
	 */
	protected $responses = [];

	/**
	 * Missing fields from validation
	 *
	 * @var array
	 */
	protected $missingFields = [];

	/**
	 * Create a new model instance.
	 *
	 * @param array $attributes
	 * @return void
	 */
	public function __construct(array $attributes = [])
	{
		$this->fill($attributes);
	}

	/**
	 * Fill the model with an array of attributes.
	 *
	 * @param array $attributes
	 * @return $this
	 */
	public function fill(array $attributes)
	{
		// Add our attributes to our model
		foreach ($attributes as $key => $value) {
			$this->setAttribute($key, $value);
		}
		return $this;
	}

	/**
	 * Fill missing fields
	 *
	 * @param array $fields
	 * @return $this
	 */
	public function fillMissingFields(array $fields)
	{
		// Add our attributes to our model
		foreach ($fields as $key => $value) {
			$this->setMissingField($key, $value);
		}
		return $this;
	}

	/**
	 * Fill response fields
	 *
	 * @param array $fields
	 * @return $this
	 */
	public function fillResponses(array $fields)
	{
		// Add our attributes to our model
		foreach ($fields as $key => $value) {
			$this->setResponse($key, $value);
		}
		return $this;
	}

	/**
	 * Validator
	 *
	 * @param array $data
	 * @return bool
	 */
	public function validate($data = null)
	{
		if (empty($data)) {
			$data = $this->getAttributes();
		}

		$data = array_keys($data);

		$diff = array_diff(static::$requiredFields, $data);

		if (count($diff) === 0) {
			return true;
		}

		$this->fillMissingFields(array_diff(static::$requiredFields, $data));

		return false;
	}

	/**
	 * Get our missing fields
	 *
	 * @return null|array
	 */
	public function getMissingFields()
	{
		// Return our missing fields
		if (!empty($this->missingFields)) {
			return $this->missingFields;
		}

		return null;
	}

	/**
	 * Get response field
	 *
	 * @return null|array
	 */
	public function getResponse()
	{
		// Return our missing fields
		if (!empty($this->responses)) {
			return $this->responses;
		}

		return null;
	}

	/**
	 * Get an attribute from the model.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function getAttribute($key)
	{
		if (!$key) {
			return;
		}
		// Return our attribute value if we have it
		if (isset($this->attributes[$key])) {
			return $this->attributes[$key];
		}

		return null;
	}

	/**
	 * Get all attributes
	 *
	 * @return array
	 */
	public function getAttributes()
	{
		return $this->attributes;
	}

	/**
	 * Get all attributes
	 *
	 * @return array
	 */
	public function getResponses()
	{
		return $this->responses;
	}

	/**
	 * Set a given attribute on the model.
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setAttribute($key, $value)
	{
		$this->attributes[$key] = $value;
		return $this;
	}

	/**
	 * Set a missing field
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setMissingField($key, $value)
	{
		$this->missingFields[$value] = Client::reflectFields($value);
		return $this;
	}

	/**
	 * Set a given attribute on the model.
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return $this
	 */
	public function setResponse($key, $value)
	{
		$this->responses[$key] = $value;
		return $this;
	}

	/**
	 * Dynamically retrieve attributes on the model.
	 *
	 * @param string $key
	 * @return mixed
	 */
	public function __get($key)
	{
		return $this->getAttribute($key);
	}

	/**
	 * Dynamically set attributes on the model.
	 *
	 * @param string $key
	 * @param mixed $value
	 * @return void
	 */
	public function __set($key, $value)
	{
		$this->setAttribute($key, $value);
	}
}
