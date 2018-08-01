<?php

namespace Prologuetech\Exee\Models;

use Prologuetech\Exee\FieldTypes;
use Prologuetech\Exee\Model;

class OpenshipEndOfDayClose extends Model
{
	/**
	 * Required fields for model
	 *
	 * @var array
	 */
	public static $requiredFields = [
		FieldTypes::CUSTOMER_TRANSACTION_ID,
		FieldTypes::CARRIER_CODE
	];
}
