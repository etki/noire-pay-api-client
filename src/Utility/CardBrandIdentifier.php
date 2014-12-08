<?php

namespace Etki\Api\Clients\NoirePay\Utility;

/**
 * Identifies card.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Utility
 * @author  Etki <etki@etki.name>
 */
class CardBrandIdentifier
{
    /**
     * VISA brand.
     *
     * @type string
     * @since 0.1.0
     */
    const BRAND_VISA = 'visa';
    /**
     * Mastercard brand.
     *
     * @type string
     * @since 0.1.0
     */
    const BRAND_MASTERCARD = 'mastercard';

    /**
     * Private constructor, static calls only.
     *
     * @since 0.1.0
     */
    private function __construct()
    {
    }

    /**
     * Identifies card brand.
     *
     * @param string $number Card number.
     *
     * @return string Card brand.
     * @since 0.1.0
     */
    public static function identify($number)
    {

    }
}
