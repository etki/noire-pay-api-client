<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transmission;

use Etki\MvnoApiClient\Entity\AbstractEntity;

/**
 * Transaction security context.
 *
 * @method $this setSender(string $sender)
 * @method string getSender()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class SecurityData extends AbstractEntity
{
    /**
     * Some unknownly-calculated hash
     *
     * @type string
     * @since 0.1.0
     */
    protected $sender;
}
