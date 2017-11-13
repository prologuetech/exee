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
	const RECIPIENT_COMPANY = 11;
	const RECIPIENT_ADDRESS_1 = 13;
	const RECIPIENT_CITY = 15;
	const RECIPIENT_STATE = 16;
	const RECIPIENT_POSTAL_CODE = 17;
	const RECIPIENT_PHONE_NUMBER = 17;

	/**
	 * 1 = Bill Sender
	 * 2 = Bill  Recipient
	 * 3 = Third-party billing
	 */
	const PAY_TYPE = 23;
	const REFERENCE_INFORMATION = 25;
	const RECIPIENT_COUNTRY = 50;
	const UNKNOWN_117 = 117;

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
	 * 1 - (default) Domestic MPS Non-associated, FedEx Express C.O.D. MPS associated, FedEx Express International MPS associated.
	 * 2 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-at-the-end.
	 * 3 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-as-you-go.
	 * 4 - Package non-associated and labels printed with each create/add piece trnsaction for domestic MPS. Print-as-you-go (PAYG-NA)
	 *
	 * See Page 84 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_ASSOCIATION_PRINT_MODE = 2600;

	/**
	 * Maximum number of copies: 500
	 */
	const LTL_FREIGHT_LABEL_NUMBER = 6117;
}
