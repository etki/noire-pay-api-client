<?php

namespace Etki\Api\Clients\NoirePay\Exception\Level\Api;

use InvalidArgumentException;
use Exception;

/**
 * Thrown whenever invalid section key is protected.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Exception\Level\Api
 * @author  Etki <etki@etki.name>
 */
class InvalidSectionKeyException extends InvalidArgumentException
{
    /**
     * Initializer.
     *
     * @param string    $message  Exception message.
     * @param int       $code     Exception code.
     * @param Exception $previous Previous exception in stack.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct(
        $message = 'Invalid section key',
        Exception $previous = null
    ) {
        parent::__construct($message, 0, $previous);
    }
}
