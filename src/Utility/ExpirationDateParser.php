<?php

namespace Etki\Api\Clients\NoirePay\Utility;

use Etki\Api\Clients\NoirePay\Exception\Utility\InvalidDateFormatException;

/**
 * Parses expiration date from a single field.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Utility
 * @author  Etki <etki@etki.name>
 */
class ExpirationDateParser
{
    private function __construct()
    {
    }

    /**
     *
     *
     * @return int[]
     * @since 0.1.0
     */
    public static function parseDate($date)
    {
        preg_match('~(\d{1,2})\D+(\d{4}|\d{2})~', $date, $matches);
        if (!$matches || (int) $matches[1] === 0 || (int) $matches[1] > 12) {
            throw new InvalidDateFormatException;
        }
        $month = (int) $matches[1];
        $year = (int) $matches[2];
        if ($year < 100) {
            $year += 2000;
        }
        return array('month' => $month, 'year' => $year,);
    }
}
