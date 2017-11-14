<?php

namespace Prologuetech\Exee;

/**
 * See Page 52 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
 *
 * @package Prologuetech\Exee
 */
class FieldTypes
{
	const CUSTOMER_TRANSACTION_ID = 1;
	const DECLARED_OR_CARRIAGE_VALUE = 9;
	const SENDER_FEDEX_EXPRESS_ACCOUNT_NUMBER = 10;
	const RECIPIENT_COMPANY = 11;
	const RECIPIENT_ADDRESS_1 = 13;
	const RECIPIENT_CITY = 15;
	const RECIPIENT_STATE = 16;
	const RECIPIENT_POSTAL_CODE = 17;
	const RECIPIENT_PHONE_NUMBER = 18;

	/**
	 * 1 = Bill Sender
	 * 2 = Bill Recipient
	 * 3 = Third-party billing
	 */
	const PAY_TYPE = 23;
	const REFERENCE_INFORMATION = 25;
	const COD_FLAG = 27;
	const TRACKING_NUMBER = 29;
	const RECIPIENT_COUNTRY = 50;
	const COD_COLLECT_AMOUNT = 53;
	const PACKAGE_HEIGHT = 57;
	const PACKAGE_WIDTH = 58;
	const PACKAGE_LENGTH = 59;
	const UNKNOWN_117 = 117;

	/**
	 * 01 - Customer Packaging
	 * 02 - FedEx Packaging, Express only
	 * 03 - FedEx Box
	 * 04 - FedEx Tube
	 * 05 - FedEx Envelope
	 *
	 * International:
	 * 15 - FedEx 10 KG Box
	 * 25 - FedEx 25 KG Box
	 *
	 * See Page 97 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGING_TYPE = 127;

	/**
	 * Y = Data validated for any shipping method
	 * P = Data validated for openship only, before saving
	 * N = Ships and label produced
	 *
	 * Requires FieldTypes::OPENSHIP_FLAGS to be: NNNNNNNNN
	 *
	 * See Page 80 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 *
	 * @see FieldTypes::OPENSHIP_FLAGS
	 */
	const OPENSHIP_PRE_SHIP_VALIDATION = 184;

	/**
	 * A 4 quadrant label type is supported for FedEx Freight that will produce 4 identical 3.5" x 5" thermal label images on one 8 1/2" x 11"
	 * piece of plain paper using the following format values:
	 *
	 * 4QP — 3.5" x 5"
	 * PDF 4QL — 3.5" x 5" PNG
	 * 4QD — 3.5" x 5"
	 * DIB
	 *
	 * See Page 929 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const LABEL_FORMAT_TYPE = 187;
	const DANGEROUS_GOODS_OR_HAZMAT_FLAG = 331;
	const METER_NUMBER = 498;

	/**
	 * Openship flags, Y = on, N = off
	 *
	 * 1 - Create shipment:         YNNNNNNNN
	 * 2 - Route/Time-in-Transit:   NYNNNNNNN
	 * 3 - Rate shipment:           NNYNNNNNN
	 * 4 - Add a package:           NNNYNNNNN
	 * 5 - Edit a package:          NNNNYNNNN
	 * 6 - Edit the shipment:       NNNNNYNNN
	 * 7 - Delete a package:        NNNNNNYNN
	 * 8 - Delete the shipment:     NNNNNNNYN
	 * 9 - Confirm the package      NNNNNNNNY
	 * 9 - Confirm the shipment:    NNNNNNNNY
	 *
	 * See Page 78 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const OPENSHIP_FLAGS = 541;

	/**
	 * Openship index field is a unique number per openship shipment per meter. It is set to the unique number passed in the create transaction.
	 *
	 * This is not required when simultaneously performing a create or add transaction, examples:
	 *
	 * Shipment level create and route/time in transit: YYNNNNNNN
	 * Package level add and shipment level route/time in transit: NYNYNNNNN
	 */
	const OPENSHIP_INDEX = 542;
	const THERMAL_PRINTER_ID = 537;

	/**
	 * 1 - Rate Quote
	 * 2 - Route/Time in Transit
	 * 3 - Rate Quote and Route
	 */
	const RATE_FLAG = 1234;

	/**
	 * See Page 89 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const SERVICE_TYPE = 1274;

	/**
	 * See Page 101 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_OR_SHIPMENT_WEIGHT = 1670;
	const DRY_ICE_WEIGHT = 1684;

	/**
	 * Y - Yes (No rates returned)
	 * N - No (Rates will be returned)
	 */
	const NO_SHIPTIME_RATES = 2028;

	/**
	 * 1 - (default) Domestic MPS Non-associated, FedEx Express C.O.D. MPS associated, FedEx Express International MPS associated.
	 * 2 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-at-the-end.
	 * 3 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-as-you-go.
	 * 4 - Package non-associated and labels printed with each create/add piece trnsaction for domestic MPS. Print-as-you-go (PAYG-NA)
	 *
	 * See Page 84 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_ASSOCIATION_PRINT_MODE = 2600;
	const ECOD_FLAG = 3014;
	const NONSTANDARD_CONTAINER_FLAG = 3018;
	const GND_PACKAGE_LEVEL_PO_NUMBER = 3056;
	const PACKAGE_INVOICE_NUMBER = 3057;

	/**
	 * 1 - Discount Rates only (default)
	 * 2 - List Rates and Discount
	 */
	const RATE_QUOTE_TYPE = 3062;
	const FEDEX_GROUND_OVERSIZE_INDEICATOR = 3124;

	/**
	 * Maximum number of copies: 500
	 */
	const LTL_FREIGHT_LABEL_NUMBER = 6117;
}
