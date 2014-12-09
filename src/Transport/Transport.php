<?php

namespace Etki\Api\Clients\NoirePay\Transport;

use Etki\Api\Clients\NoirePay\Transport\Message\Message;
use Etki\Api\Clients\NoirePay\Level\Api\Parser;
use Etki\Api\Clients\NoirePay\Level\Api\Renderer;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;

/**
 * Message transport.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Transport
 * @author  Etki <etki@etki.name>
 */
class Transport implements TransportInterface
{
    protected $defaultsSchema = array(
        'request',
        'security',
        null,
        'user',
        null,
        'transaction',
        'identification',
        null,
        'payment',
        'presentation',
        null,
        'account',
        'name',
        null,
        'address',
        null,
        'contact',
        'criterion',
    );
    /**
     * Transports message to server.
     *
     * @param string  $url     URL to send message to.
     * @param Message $message Message to send.
     *
     * @return Message Response.
     * @since 0.1.0
     */
    public function sendMessage($url, Message $message)
    {
        $client = new Client();
        $headers = array(
            'Content-Type' => 'application/x-www-form-urlencoded;charset=UTF-8',
        );
        $request = $client->post($url, $headers, $message->getDataAsPlainArray());
        try {
            $response = $request->send();
        } catch (ClientErrorResponseException $exception) {
            throw $exception;
        }
        $responseMessage = new Message;
        $data = array();
        parse_str($response->getBody(true), $data);
        $data = array_map('trim', $data);
        $responseMessage->setData($data);
        return $responseMessage;
    }
}
