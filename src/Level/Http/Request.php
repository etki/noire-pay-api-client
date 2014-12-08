<?php

namespace Etki\Api\Clients\NoirePay\Level\Http;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Simple HTTP request.
 *
 * @method string[] getHeaders()
 * @method $this setHeaders(array $headers)
 * @method string[] getQueryParameters()
 * @method $this setQueryParameters(array $queryParameters)
 * @method string getBody()
 * @method $this setBody(string $body)
 * @method string getMethod()
 * @method $this setMethod(string $method)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Http
 * @author  Etki <etki@etki.name>
 */
class Request extends AbstractEntity
{
    /**
     * HTTP headers.
     *
     * @type array
     * @since 0.1.0
     */
    protected $headers = array();
    /**
     * Query parameters.
     *
     * @type array
     * @since 0.1.0
     */
    protected $queryParameters = array();
    /**
     * Request body.
     *
     * @type string
     * @since 0.1.0
     */
    protected $body;
    /**
     * HTTP method.
     *
     * @type string
     * @since 0.1.0
     */
    protected $method;
    const HTTP_METHOD_GET = 'GET';
    const HTTP_METHOD_POST = 'POST';

    /**
     * Adds single header.
     *
     * @param string $header Header key.
     * @param string $value  Header value.
     *
     * @return void
     * @since 0.1.0
     */
    public function addHeader($header, $value)
    {
        $this->headers[$header] = $value;
    }

    /**
     * Deletes header.
     *
     * @param string $header Header to delete.
     *
     * @return void
     * @since 0.1.0
     */
    public function removeHeader($header)
    {
        unset($this->headers[$header]);
    }

    /**
     * Adds single query parameter.
     *
     * @param string $parameter Parameter name.
     * @param string $value     Parameter value.
     *
     * @return void
     * @since 0.1.0
     */
    public function addQueryParameter($parameter, $value)
    {
        $this->queryParameters[$parameter] = $value;
    }

    /**
     * Removes query parameter.
     *
     * @param string $parameter Parameter name
     *
     * @return void
     * @since 0.1.0
     */
    public function removeQueryParameter($parameter)
    {
        unset($this->queryParameters[$parameter]);
    }
}
