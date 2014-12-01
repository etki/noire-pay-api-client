<?php

namespace Etki\Api\Clients\NoirePay\Transport;

use Etki\Api\Clients\NoirePay\Transport\Message\Message;
use Etki\Api\Clients\NoirePay\Transport\Message\Parser;
use Etki\Api\Clients\NoirePay\Transport\Message\Renderer;
use Guzzle\Http\Client;

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
        $render = Renderer::render($message->getData());
        $client = new Client();
        $request = $client->post($url, array(), $render);
        $response = $request->send();
        $responseMessage = new Message;
        $responseMessage->setData(Parser::parse($response->getBody(true)));
        return $responseMessage;
    }
}
