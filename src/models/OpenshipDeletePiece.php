<?php

namespace Prologuetech\Exee\Models;

use Prologuetech\Exee\FieldTypes;
use Prologuetech\Exee\Model;

class OpenshipDeletePiece extends Model
{
	/**
	 * Required fields for model
	 *
	 * @var array
	 */
	public static $requiredFields = [
		FieldTypes::OPENSHIP_FLAGS,
		FieldTypes::OPENSHIP_INDEX,
		FieldTypes::TRACKING_NUMBER,
//		FieldTypes::CUSTOMER_TRANSACTION_ID,
		FieldTypes::SERVICE_TYPE,

	];
}
