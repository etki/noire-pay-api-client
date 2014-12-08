<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction\Response;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Response verification section.
 *
 * @method $this setSecurityHash(string $securityHash)
 * @method string getSecurityHash()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class Verification extends AbstractEntity
{
    /**
     * Security hash.
     *
     * @type string
     * @since 0.1.0
     */
    protected $securityHash;
}
