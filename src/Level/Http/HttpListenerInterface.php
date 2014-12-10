<?php

namespace Etki\Api\Clients\NoirePay\Level\Http;

/**
 * Observes HTTP communication.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Http
 * @author  Etki <etki@etki.name>
 */
interface HttpListenerInterface
{
    /**
     * Observes HTTP communication.
     *
     * @param Request  $request
     * @param Response $response
     *
     * @return void
     * @since 0.1.0
     */
    public function observe(Request $request, Response $response);
}
