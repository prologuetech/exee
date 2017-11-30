<?php

namespace Prologuetech\Exee\Models;

use Prologuetech\Exee\FieldTypes;
use Prologuetech\Exee\Model;

class OpenshipConfirmShipment extends Model
{
	/**
	 * Required fields for model
	 *
	 * @var array
	 */
	public static $requiredFields = [
		FieldTypes::OPENSHIP_FLAGS,
		FieldTypes::OPENSHIP_INDEX,
		FieldTypes::SERVICE_TYPE,
	];
}
