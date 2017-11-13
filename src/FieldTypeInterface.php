<?php

namespace Prologuetech\Exee;

interface FieldTypeInterface
{
	/**
	 * See Page 52 FedEx Ship Manager Server Developer Guide, 2017
	 */
	const FIELD_CUSTOMER_TRANSACTION_ID = 1;
	const FIELD_RECIPIENT_COMPANY = 11;
	const FIELD_RECIPIENT_ADDRESS_1 = 13;
	const FIELD_PAY_TYPE = 23;
	const FIELD_RECIPIENT_COUNTRY = 50;
	const FIELD_UNKNOWN_117 = 117;
}
