<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Exception\Level\Application\InvalidSecurityHashException;
use Etki\Api\Clients\NoirePay\Exception\Level\Application\UnsuccessfulResponseException;
use Etki\Api\Clients\NoirePay\Validation\SecurityHashGenerator;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;

/**
 *
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
class ConfirmationValidator
{
    /**
     * Private constructor, only static method calls are allowed.
     *
     * @since 0.1.0
     */
    private function __construct()
    {
    }

    /**
     * Validates response.
     *
     * @param TransactionConfirmation $confirmation
     * @param SecurityDetails         $securityDetails
     *
     * @return void
     * @since 0.1.0
     */
    public static function validate(
        TransactionConfirmation $confirmation,
        SecurityDetails $securityDetails
    ) {
        $hash = SecurityHashGenerator::generateHash(
            $confirmation,
            $securityDetails
        );
        if ($confirmation->getVerification()->getSecurityHash() !== $hash) {
            throw new InvalidSecurityHashException;
        }
        if ($confirmation->getProcessingStatus()->getStatusCode() !== '90'
            || $confirmation->getProcessingStatus()->getReasonCode() !== '00'
        ) {
            throw new UnsuccessfulResponseException;
        }
    }
}
