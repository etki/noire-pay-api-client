<?php

namespace Etki\Api\Clients\NoirePay\Level\Http;

use Guzzle\Http\Message\Request as GuzzleRequest;
use Guzzle\Http\Message\Response as GuzzleResponse;

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
     * @param GuzzleRequest  $request  Guzzle request.
     * @param GuzzleResponse $response Guzzle response.
     *
     * @return void
     * @since 0.1.0
     */
    public function observe(GuzzleRequest $request, GuzzleResponse $response);
}
