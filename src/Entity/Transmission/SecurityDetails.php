<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transmission;

use Etki\MvnoApiClient\Entity\AbstractEntity;

/**
 * Transaction security context.
 *
 * @method $this setSender(string $sender)
 * @method string getSender()
 * @method $this setSecret(string $secret)
 * @method string getSecret()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class SecurityDetails extends AbstractEntity
{
    /**
     * Some unknownly-calculated hash
     *
     * @type string
     * @since 0.1.0
     */
    protected $sender;
    /**
     * Special secret value used to verify signatures.
     *
     * @type string
     * @since 0.1.0
     */
    protected $secret;
}
