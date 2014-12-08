<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;
use Etki\Api\Clients\NoirePay\Entity\Transmission\TransmissionDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Identification;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\ProcessingStatus;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\PaymentDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\Verification;

/**
 * Transaction confirmation. Comes from the server as a response to transaction
 * request.
 *
 * @method $this setSecurityDetails(SecurityDetails $securityDetails)
 * @method SecurityDetails getSecurityDetails()
 * @method $this setTransmissionDetails(TransmissionDetails $transmissionDetails)
 * @method TransmissionDetails getTransmissionDetails()
 * @method $this setIdentification(Identification $identification)
 * @method Identification getIdentification()
 * @method $this setProcessingStatus(ProcessingStatus $processingStatus)
 * @method ProcessingStatus getProcessingStatus()
 * @method $this setPaymentDetails(PaymentDetails $paymentDetails)
 * @method PaymentDetails getPaymentDetails()
 * @method $this setVerification(Verification $verification)
 * @method Verification getVerification()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
class TransactionConfirmation extends AbstractEntity
{
    /**
     * Security details.
     *
     * @type SecurityDetails
     * @since 0.1.0
     */
    protected $securityDetails;
    /**
     * Transaction transmission details.
     *
     * @type TransmissionDetails
     * @since 0.1.0
     */
    protected $transmissionDetails;
    /**
     * Transaction identification.
     *
     * @type Identification
     * @since 0.1.0
     */
    protected $identification;
    /**
     * Processing status.
     *
     * @type ProcessingStatus
     * @since 0.1.0
     */
    protected $processingStatus;
    /**
     * Response payment details.
     *
     * @type PaymentDetails
     * @since 0.1.0
     */
    protected $paymentDetails;
    /**
     * Response verification.
     *
     * @type Verification
     * @since 0.1.0
     */
    protected $verification;
}
