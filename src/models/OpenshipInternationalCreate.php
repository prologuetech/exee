<?php

namespace Prologuetech\Exee\Models;

use Prologuetech\Exee\FieldTypes;
use Prologuetech\Exee\Model;

class OpenshipInternationalCreate extends Model
{
	/**
	 * Required fields for model
	 *
	 * @var array
	 */
	public static $requiredFields = [
//		FieldTypes::OPENSHIP_FLAGS,
//		FieldTypes::RATE_FLAG,
//		FieldTypes::NO_SHIPTIME_RATES,
		FieldTypes::RATE_QUOTE_TYPE,
		FieldTypes::RATE_CURRENCY_TYPE,

		FieldTypes::RECIPIENT_COMPANY,
		FieldTypes::RECIPIENT_CONTACT_NAME,
		FieldTypes::RECIPIENT_ADDRESS_1,
//		FieldTypes::RECIPIENT_ADDRESS_2,
		FieldTypes::RECIPIENT_CITY,
//		FieldTypes::RECIPIENT_STATE,
		FieldTypes::RECIPIENT_POSTAL_CODE,
		FieldTypes::RECIPIENT_PHONE_NUMBER,
		FieldTypes::RECIPIENT_COUNTRY,
		FieldTypes::DESCRIPTION_OF_CONTENTS,
		FieldTypes::PACKAGE_OR_SHIPMENT_WEIGHT,
		FieldTypes::SENDER_COUNTRY_CODE,
		FieldTypes::RESIDENTIAL_DELIVERY_FLAG,
		FieldTypes::PAY_TYPE,
//		FieldTypes::OPENSHIP_INDEX,
		FieldTypes::SERVICE_TYPE,
		FieldTypes::COUNTRY_OF_MANUFACTURER,


	];
}
