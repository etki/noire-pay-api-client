<?php

namespace Etki\Api\Clients\NoirePay\Level\Http;

use Etki\Api\Clients\NoirePay\Transport\Message\Message;

/**
 * Message listener interface.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Http
 * @author  Etki <etki@etki.name>
 */
interface MessageListenerInterface
{
    /**
     * Observes conversation.
     *
     * @param Message $request  Request message.
     * @param Message $response Response message.
     *
     * @return void
     * @since 0.1.0
     */
    public function observeMessageConversation(
        Message $request,
        Message $response
    );
}
