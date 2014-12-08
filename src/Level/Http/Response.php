<?php

namespace Etki\Api\Clients\NoirePay\Level\Http;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Simple HTTP response.
 *
 * @method string[] getHeaders()
 * @method $this setHeaders(array $headers)
 * @method string getBody()
 * @method $this setBody(string $body)
 * @method int getStatusCode()
 * @method $this setStatusCode(int $statusCode)
 * @method string getStatusMessage()
 * @method $this setStatusMessage(string $statusMessage)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Http
 * @author  Etki <etki@etki.name>
 */
class Response extends AbstractEntity
{
    /**
     * List of headers.
     *
     * @type string[]
     * @since 0.1.0
     */
    protected $headers;
    /**
     * Response body.
     *
     * @type string
     * @since 0.1.0
     */
    protected $body;
    /**
     * Status code.
     *
     * @type int
     * @since 0.1.0
     */
    protected $statusCode;
    /**
     * Status message.
     *
     * @type string
     * @since 0.1.0
     */
    protected $statusMessage;
}
