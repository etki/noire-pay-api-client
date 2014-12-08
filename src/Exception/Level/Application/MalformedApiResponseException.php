<?php

namespace Etki\Api\Clients\NoirePay\Exception\Level\Application;

use InvalidArgumentException;
use Exception;

/**
 * Thrown whenever malformed response is received.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Exception\Level\Application
 * @author  Etki <etki@etki.name>
 */
class MalformedApiResponseException extends InvalidArgumentException
{
    /**
     * @param string    $message  Exception message.
     * @param Exception $previous Previous exception.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct(
        $message = 'Malformed API response received',
        Exception $previous = null
    ) {
        parent::__construct($message, 0, $previous);
    }
}
