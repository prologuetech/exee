<?php

namespace Prologuetech\Exee;

class Openship
{
	/**
	 * Bit flag for on/true
	 */
	const ON = 'Y';

	/**
	 * Bit flag for off/false
	 */
	const OFF = 'N';

	/**
	 * Transaction positions
	 */
	const CREATE_SHIPMENT = 1;
	const ROUTE_OR_TRANSIT_IN_TIME = 2;
	const RATE_SHIPMENT = 3;
	const ADD_PACKAGE = 4;
	const EDIT_PACKAGE = 5;
	const EDIT_SHIPMENT = 6;
	const DELETE_PACKAGE = 7;
	const DELETE_SHIPMENT = 8;
	const CONFIRM_SHIPMENT = 9;

	/**
	 * Toggles flags on for given types
	 *
	 * @param array $toggles
	 * @return string
	 */
	public static function flags($toggles = null)
	{
		$flags = [
			1 => 'N',
			2 => 'N',
			3 => 'N',
			4 => 'N',
			5 => 'N',
			6 => 'N',
			7 => 'N',
			8 => 'N',
			9 => 'N',
		];

		// Allow developers to request the default template
		if (empty($toggles)) {
			return $flags;
		}

		// Loop our flags
		foreach ($toggles as $position) {
			// Replace our prior value with static::ON
			$flags[$position] = static::ON;
		}

		return implode('', $flags);
	}
}
