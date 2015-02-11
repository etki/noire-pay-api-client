<?php

namespace Etki\Api\Clients\NoirePay\Exception\Transport;

use RuntimeException;
use Exception;

/**
 * Designed to be thrown whenever inexisting item is requested.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Exception\Transport
 * @author  Etki <etki@etki.name>
 */
class ItemDoesNotExistException extends RuntimeException
{
    /**
     * Item key.
     *
     * @type string
     * @since 0.1.0
     */
    private $itemKey;

    /**
     * Initializer.
     *
     * @param string    $itemKey
     * @param string    $message
     * @param Exception $previous
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct(
        $itemKey,
        $message = null,
        Exception $previous = null
    ) {
        $this->itemKey = $itemKey;
        if (!$message) {
            $message = sprintf(
                'Following item couldn\'t be found in message object: `%s`',
                $itemKey
            );
        }
        parent::__construct($message, 0, $previous);
    }
}
