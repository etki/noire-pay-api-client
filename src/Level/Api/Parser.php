<?php

namespace Etki\Api\Clients\NoirePay\Level\Api;

/**
 * This class parses raw API interaction message.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Transaction
 * @author  Etki <etki@etki.name>
 */
class Parser
{
    /**
     * Parses message.
     *
     * @param string $message Message to parse.
     *
     * @return array
     * @since 0.1.0
     */
    public static function parse($message)
    {
        $pattern = '~^\s*(\w+).(\w+)=(.*)\s*$~m';
        preg_match_all($pattern, $message, $matches, PREG_SET_ORDER);
        $data = array();
        foreach ($matches as $set) {
            list($section, $key, $value) = array_slice($set, 1);
            if (!isset($data[$section])) {
                $data[$section] = array();
            }
            $data[$section][$key] = $value;
        }
        return $data;
    }
}
