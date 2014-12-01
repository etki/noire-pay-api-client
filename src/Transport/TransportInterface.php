<?php

namespace Etki\Api\Clients\NoirePay\Transport;

use Etki\Api\Clients\NoirePay\Transport\Message\Message;

/**
 * AN interface that describes API transport.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Transport
 * @author  Etki <etki@etki.name>
 */
interface TransportInterface
{
    /**
     * Sends request.
     *
     * @param string  $url     URL to send message to.
     * @param Message $message Message to send.
     *
     * @return Message Response.
     * @since 0.1.0
     */
    public function sendMessage($url, Message $message);
}
