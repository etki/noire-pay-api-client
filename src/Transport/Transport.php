<?php

namespace Etki\Api\Clients\NoirePay\Transport;

use Etki\Api\Clients\NoirePay\Level\Http\HttpListenerInterface;
use Guzzle\Http\Message\Request as GuzzleRequest;
use Guzzle\Http\Message\Response as GuzzleResponse;
use Etki\Api\Clients\NoirePay\Transport\Message\Message;
use Guzzle\Http\Client;
use Guzzle\Http\Exception\ClientErrorResponseException;
use Etki\Api\Clients\NoirePay\Level\Http\MessageListenerInterface;

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
     * Listeners.
     *
     * @type HttpListenerInterface[]
     * @since 0.1.0
     */
    protected $listeners = array();
    /**
     * Listeners
     *
     * @type MessageListenerInterface[]
     * @since 0.1.0
     */
    protected $messageListeners = array();
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
        $response = $request->send();
        $responseMessage = new Message;
        $data = array();
        parse_str($response->getBody(true), $data);
        $data = array_map('trim', $data);
        $responseMessage->setData($data);
        $this->logMessages($message, $responseMessage);
        $this->logConversation($request, $response);
        return $responseMessage;
    }

    /**
     * Saves listener.
     *
     * @param HttpListenerInterface $listener Listener.
     *
     * @return void
     * @since 0.1.0
     */
    public function setListener(HttpListenerInterface $listener)
    {
        $this->listeners[] = $listener;
        $this->listeners = array_unique($this->listeners);
    }

    /**
     *
     *
     * @param MessageListenerInterface $listener
     *
     * @return void
     * @since 0.1.0
     */
    public function setMessageListener(MessageListenerInterface $listener)
    {
        $this->messageListeners[] = $listener;
        $this->messageListeners = array_unique($this->messageListeners);
    }

    /**
     * Logs conversation.
     *
     * @param GuzzleRequest  $request  Request.
     * @param GuzzleResponse $response Response.
     *
     * @return void
     * @since 0.1.0
     */
    protected function logConversation(
        GuzzleRequest $request,
        GuzzleResponse $response
    ) {
        foreach ($this->listeners as $listener) {
            $listener->observe($request, $response);
        }
    }

    /**
     * Logs messages.
     *
     * @param Message $request  Request message.
     * @param Message $response Response message.
     *
     * @return void
     * @since 0.1.0
     */
    protected function logMessages(Message $request, Message $response)
    {
        foreach ($this->messageListeners as $listener) {
            $listener->observeMessageConversation($request, $response);
        }
    }
}
