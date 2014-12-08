<?php

namespace Etki\Api\Clients\NoirePay\Exception\Utility;

use InvalidArgumentException;
use Exception;

/**
 * Thrown if invalid date format is supported.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Exception\Utility
 * @author  Etki <etki@etki.name>
 */
class InvalidDateFormatException extends InvalidArgumentException
{
    /**
     * Custom initializer.
     *
     * @param string    $message  Message to be shown.
     * @param int       $code     Exception code.
     * @param Exception $previous Previous exception in stack (if any).
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct(
        $message = 'Invalid date format',
        $code = 0,
        Exception $previous = null
    ) {
        parent::__construct($message, $code, $previous);
    }
}
