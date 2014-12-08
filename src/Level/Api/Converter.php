<?php

namespace Etki\Api\Clients\NoirePay\Level\Api;

use Etki\Api\Clients\NoirePay\Level\Http\Response as HttpResponse;
use Etki\Api\Clients\NoirePay\Level\Http\Request as HttpRequest;
use Etki\Api\Clients\NoirePay\Level\Api\Request as ApiRequest;
use Etki\Api\Clients\NoirePay\Level\Api\Response as ApiResponse;

/**
 * Converts API and HTTP requests and responses.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Api
 * @author  Etki <etki@etki.name>
 */
class Converter
{
    /**
     * Order of sections in request.
     *
     * @type string[]
     * @since 0.1.0
     */
    protected static $requestSchema = array(
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
        null,
        'name',
        null,
        'address',
        null,
        'contact',
    );
    /**
     * Private constructor, only static method calls are allowed.
     *
     * @since 0.1.0
     */
    private function __construct()
    {
    }

    /**
     * Converts HTTP response into API response.
     *
     * @param HttpResponse $httpResponse Original HTTP response.
     *
     * @return ApiResponse Generated response.
     * @since 0.1.0
     */
    public static function convertHttpResponse(HttpResponse $httpResponse)
    {
        $apiResponse = new ApiResponse;
        $apiResponse->setData(Parser::parse($httpResponse->getBody()));
    }

    /**
     * Converts API request to HTTP request.
     *
     * @param ApiRequest $apiRequest Request to process.
     *
     * @return HttpRequest Generated request.
     * @since 0.1.0
     */
    public static function convertApiRequest(ApiRequest $apiRequest)
    {
        $httpRequest = new HttpRequest;
        $body = Renderer::render(
            $apiRequest->getData(),
            static::$requestSchema
        );
        $httpRequest->setBody($body);
        return $httpRequest;
    }
}
