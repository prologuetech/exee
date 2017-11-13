<?php

namespace Prologuetech\Exee\Models;

use Prologuetech\Exee\FieldTypes;
use Prologuetech\Exee\Model;

class OpenshipRate extends Model
{
	/**
	 * Required fields for model
	 *
	 * @var array
	 */
	public static $requiredFields = [
		FieldTypes::OPENSHIP_FLAGS,
		FieldTypes::OPENSHIP_INDEX,
		FieldTypes::RATE_FLAG,
		FieldTypes::NO_SHIPTIME_RATES,
		FieldTypes::RATE_QUOTE_TYPE,
	];
}
