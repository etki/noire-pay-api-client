<?php

namespace Etki\Api\Clients\NoirePay\Utility;

/**
 * Formats card number.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Utility
 * @author  Etki <etki@etki.name>
 */
class CardNumberFormatter
{
    /**
     * Private constructor, static method calls only.
     *
     * @since 0.1.0
     */
    private function __construct()
    {
    }

    /**
     * Formats card number into `xxxx xxxx xxxx xxxx` format.
     *
     * @param string $number Card number.
     *
     * @return string
     * @since 0.1.0
     */
    public static function formatCardNumber($number)
    {
        $strippedNumber = preg_replace('~\s~', '', $number);
        return implode(' ', str_split($strippedNumber, 4));
    }
}
