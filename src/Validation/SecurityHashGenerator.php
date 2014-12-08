<?php

namespace Etki\Api\Clients\NoirePay\Validation;

use Etki\Api\Clients\NoirePay\Level\Application\TransactionConfirmation;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;

/**
 * This class helps with security hash generation.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Verification
 * @author  Etki <etki@etki.name>
 */
class SecurityHashGenerator
{
    /**
     * Private constructor, only static calls are allowed.
     */
    private function __construct()
    {
    }
    /**
     * Generates security hash for API response.
     *
     * @param TransactionConfirmation $response       API response.
     * @param SecurityDetails         $securityDetails
     *
     * @return string Generated hash.
     * @since 0.1.0
     */
    public static function generateHash(
        TransactionConfirmation $response,
        SecurityDetails $securityDetails
    ) {
        $securityDetails->assertPropertySet('secret');
        $data = array(
            $response->getPaymentDetails()->getCode(),
            $response->getIdentification()->getTransactionId().
            $response->getIdentification()->getUniqueId(),
            $response->getPaymentDetails()->getClearingAmount(),
            $response->getPaymentDetails()->getClearingCurrency(),
            $response->getProcessingStatus()->getRiskScore(),
            $response->getTransmissionDetails()->getMode(),
            $response->getProcessingStatus()->getReturnCode(),
            $response->getProcessingStatus()->getReasonCode(),
            $response->getProcessingStatus()->getStatusCode(),
            $securityDetails->getSecret(),
        );
        return sha1(implode('|', $data));
    }
}
