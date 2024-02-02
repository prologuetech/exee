<?php

namespace Prologuetech\Exee;

/**
 * See Page 52 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
 *
 * @package Prologuetech\Exee
 */
class FieldTypes
{
	const TRANSACTION_CODE = 0;

	const CUSTOMER_TRANSACTION_ID = 1;
	const TRANSACTION_STATUS = 2;
	const ERROR_MESSAGE = 3;

	const DECLARED_OR_CARRIAGE_VALUE = 9;
	const SENDER_FEDEX_EXPRESS_ACCOUNT_NUMBER = 10;
	const RECIPIENT_COMPANY = 11;
	const RECIPIENT_CONTACT_NAME = 12;
	const RECIPIENT_ADDRESS_1 = 13;
	const RECIPIENT_ADDRESS_2 = 14;
	const RECIPIENT_CITY = 15;
	const RECIPIENT_STATE = 16;
	const RECIPIENT_POSTAL_CODE = 17;
	const RECIPIENT_PHONE_NUMBER = 18;

	const PAYOR_ACCOUNT_NUMBER = 20;

	/**
	 * 1 = Bill Sender
	 * 2 = Bill Recipient
	 * 3 = Third-party billing
	 */
	const PAY_TYPE = 23;
	const SHIP_DATE = 24;
	const REFERENCE_INFORMATION = 25;
	const DECLARED_VALUE = 26;
	const COD_FLAG = 27;
	const TRACKING_NUMBER = 29;

	const URSA_CODE = 30;
	const SERVICE_COMMITMENT = 33;

	const RECIPIENT_COUNTRY = 50;
	const COD_COLLECT_AMOUNT = 53;
	const PACKAGE_HEIGHT = 57;
	const PACKAGE_WIDTH = 58;
	const PACKAGE_LENGTH = 59;
	const CARRIAGE_VALUE = 69;
	const BASE_RATE_AMOUNT = 34;
	const TOTAL_SURCHARGE_AMOUNT = 35;
	const TOTAL_DISCOUNT_AMOUNT = 36;
	const NET_CHARGE_AMOUNT = 37;
	const BILL_WEIGHT = 60;
	const PARTIES_TO_TRANSACTION = 73;
	const COUNTRY_OF_ULTIMATE_DESTINATION = 74;
	const WEIGHT_UNITS = 75;
	const WEIGHT = 77;
	const DESCRIPTION_OF_CONTENTS = 79;
	const COUNTRY_OF_MANUFACTURER = 80;
	const HARMONIZED_CODE = 81;
	const UNIT_QUANTITY = 82;
	const TOTAL_WEIGHT = 112;
	const COMMERCIAL_INVOICE_FLAG = 113;
	const PACKAGE_TOTAL = 116;
	const SENDER_COUNTRY_CODE = 117;

	const CI_MARKS_AND_NUMBERS = 120;
	const PRINTER_FORMAT_STRING = 188;

    const DUTY_TAX_CODE = 70;
    const DUTY_TAX_ACCOUNT = 71;

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

	const DELIVERY_DAY = 194;
	const DESTINATION_STATION_ID = 195;
	const DESTINATION_LOCATION_ID = 198;

	const DANGEROUS_GOODS_OR_HAZMAT_FLAG = 331;

	const DELIVERY_BY_DATE = 409;

	const UNIT_OF_MEASURE = 414;
	const CI_COMMENT = 418;

	const DECLARED_VALUE_SURCHARGE = 421;

	const DIM_WEIGHT_USED_FLAG = 431;
	const RESIDENTIAL_DELIVERY_FLAG = 440;
	const METER_NUMBER = 498;
	const FORM_ID = 526;
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
	const THERMAL_PRINTER_ID = 537;

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
	const COD_COLLECT_PLUS_FREIGHT_CHARGE = 543;

	const REVENUE_BARCODE_STRING = 552;
	const ADDRESS_BARCODE_STRING = 553;

	const TRACKING_NUMBER_TAG = 650;
	const FORM_CODE = 651;
	const FX_ROUTING_CODE = 653;

	const TRACKING_NUM_INTL = 656;

	const PLANNED_SERVICE_LEVEL = 658;
	const PRODUCT_NAME = 659;
	const DESTINATION_POSTAL_CODE = 661;
	const DESTINATION_STATE_COUNTRY = 662;
	const DESTINATION_AIRPORT = 663;
	const FEDEX_1D_BARCODE = 664;
	const VERSION = 665;

	const TRACKING_ID_TYPE = 671;
	const UNIT_VALUE = 1030;
	const INTERNATIONAL_FLAG = 1063;

	const ORIGIN_STATION_ID = 1084;
	const DIM_WEIGHT = 1086;

	const RATE_SCALE = 1089;
	const RATE_CURRENCY_TYPE = 1090;
	const RATE_ZONE = 1092;

	const PACKAGING_SEQUENCE = 1117;

	const RATE_RETURN_CODE = 1125;

	const URSA_PREFIX_CODE = 1136;

	/**
	 * 1 - Rate Quote
	 * 2 - Route/Time in Transit
	 * 3 - Rate Quote and Route
	 */
	const RATE_FLAG = 1234;

	/**
	 * See Page 89 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_TYPE = 1273;
	const SERVICE_TYPE = 1274;
	const THERMAL_LABEL_PRINT_FLAG = 1282;
	const AES_FILING_STATUS_CODE = 1349;
	const INTERIM_CONSIGNEE_CODE = 1353;
	const AES_OR_FTR_EXEMPTION_NUMBER = 1358;
	const FUEL_SURCHARGE_AMOUNT = 1393;

	const HANDLING_CHARGE = 1596;

	const TOTAL_CUSTOMER_CHARGE = 1598;
	const RETURNS_SATURDAY_DELIVERY_ALLOWED = 1690;

	/**
	 * See Page 101 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_OR_SHIPMENT_WEIGHT = 1670;
	const DRY_ICE_WEIGHT = 1684;

	const CARTAGE_AGENT_DELIVERY_FLAG = 1942;
	const USPS_DELIVERY_FLAG = 1943;
	const ALTERNATE_DAY_SERVICE_DELIVERY_FLAG = 1944;
	const ADMISSIBILITY_PACKAGE_TYPE = 1958;

	/**
	 * Y - Yes (No rates returned)
	 * N - No (Rates will be returned)
	 */
	const NO_SHIPTIME_RATES = 2028;
	const CONTAINS_PERSONAL_BUSINESS_INTEROFFICE_DOCS = 2396;

	const SIGNATURE_OPTIONS = 2399;

	const SHIPMENT_DOCUMENTATOIN_TYPE = 2404;

	const CUSTOMIZED_GROUND_TRANSIT_TIME = 2703;



	/**
	 * 1 - (default) Domestic MPS Non-associated, FedEx Express C.O.D. MPS associated, FedEx Express International MPS associated.
	 * 2 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-at-the-end.
	 * 3 - Domestic U.S. MPS for FedEx Express and FedEx Ground services. Package association. Print-as-you-go.
	 * 4 - Package non-associated and labels printed with each create/add piece trnsaction for domestic MPS. Print-as-you-go (PAYG-NA)
	 *
	 * See Page 84 FedEx Ship Manager Server v17.0.1 Developer Guide, 2017
	 */
	const PACKAGE_ASSOCIATION_PRINT_MODE = 2600;
	const AHS_SURCHARGE = 3013;
	const ECOD_FLAG = 3014;
	const NONSTANDARD_CONTAINER_FLAG = 3018;
	const CARRIER_CODE = 3025;
	const GND_PACKAGE_LEVEL_PO_NUMBER = 3056;
	const PACKAGE_INVOICE_NUMBER = 3057;
	const GROUND_TIME_IN_TRANSIT = 3058;
	const GROUND_UCC_EAN_BARCODE = 3063;
	const GROUND_SERVICE_CODE = 3073;
	const MINIMUM_PACKAGE_CHARGE = 4565;
	const AHS_TYPE = 4912;

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

	/**
	 * Saturday Delivery flag
	 */
	const SATURDAY_DELIVERY = 1266;
	const HOLD_AT_FEDEX_LOCATION = 1200;

	/**
	 * Total Commodity Customs Value
	 */
	const TOTAL_COMMODITY_CUSTOMS_VALUE = 119;

	/**
     * Triggers the transmission of ETD from FSMS to FedEx backend.
     * 2818 is ETD Document Type. 1 is Commercial Invoice.
     * FedEx Case #19964327
     */
    public const ETD_TRANSMIT_TO_FEDEX_ETD_DOC_TYPE = 2818;

    /**
     * Some countries require this when ETD_TRANSMIT_TO_FEDEX_ETD_DOC_TYPE is used.
     * Value is Y.
     * Example, required for Guam.
     * FedEx TR# 2785885
     */ 
    public const ETD_TRANSMIT_TO_FEDEX_DIGITAL_LETTERHEAD_INDICATOR = 6112;
	
    /**
     * Some countries require this when ETD_TRANSMIT_TO_FEDEX_ETD_DOC_TYPE is used.
     * Value is Y.
     * Example, required for China.
     * FedEx TR# 2785885
     */
    public const ETD_TRANSMIT_TO_FEDEX_DIGITAL_SIGNATURE_INDICATOR = 6113;

	/**
     * FedEx TR# 2785885
     */
    public const ETD_TRANSMIT_TO_FEDEX_DIGITAL_LETTERHEAD_IMAGE_PATH = 6114;

    /**
     * FedEx TR# 2785885
     */
    public const ETD_TRANSMIT_TO_FEDEX_DIGITAL_SIGNATURE_IMAGE_PATH = 6115;
}
