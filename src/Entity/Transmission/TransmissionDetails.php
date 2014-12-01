<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transmission;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * This class provides transmission details.
 *
 * @method $this setMode(string $mode)
 * @method string getMode()
 * @method $this setChannel(string $channel)
 * @method string getChannel()
 * @method $this setResponse(string $response)
 * @method string getResponse()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class TransmissionDetails extends AbstractEntity
{
    /**
     * Unknown.
     *
     * @type string
     * @since 0.1.0
     */
    protected $mode;
    /**
     * Unknown.
     *
     * @type string
     * @since 0.1.0
     */
    protected $channel;
    /**
     * Unknown. Usually set to 'sync'.
     *
     * @type string
     * @since 0.1.0
     */
    protected $response;
}
