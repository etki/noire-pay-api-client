<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Customer;
use Etki\Api\Clients\NoirePay\Entity\Transmission\Credentials;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;
use Etki\Api\Clients\NoirePay\Entity\Transmission\TransmissionDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Identification;
use Etki\Api\Clients\NoirePay\Entity\Transaction\PaymentDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\PlasticCard;

/**
 * This class represents transaction request.
 *
 * @method $this setSecurityDetails(SecurityDetails $securityDetails)
 * @method SecurityDetails getSecurityDetails()
 * @method $this setTransmissionDetails(TransmissionDetails $transmissionDetails)
 * @method TransmissionDetails getTransmissionDetails()
 * @method $this setCredentials(Credentials $credentials)
 * @method Credentials getCredentials()
 * @method $this setPaymentDetails(PaymentDetails $paymentDetails)
 * @method PaymentDetails getPaymentDetails()
 * @method $this setPlasticCard(PlasticCard $plasticCard)
 * @method PlasticCard getPlasticCard()
 * @method $this setIdentification(Identification $identification)
 * @method Identification getIdentification()
 * @method $this setCustomer(Customer $customer)
 * @method Customer getCustomer()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
class TransactionRequest extends AbstractEntity
{
    /**
     * Security details for request.
     *
     * @type SecurityDetails
     * @since 0.1.0
     */
    protected $securityDetails;
    /**
     * Transmission details.
     *
     * @type TransmissionDetails
     * @since 0.1.0
     */
    protected $transmissionDetails;
    /**
     * Access credentials.
     *
     * @type Credentials
     * @since 0.1.0
     */
    protected $credentials;
    /**
     * Payment data.
     *
     * @type PaymentDetails
     * @since 0.1.0
     */
    protected $paymentDetails;
    /**
     * Plastic card data.
     *
     * @type PlasticCard
     * @since 0.1.0
     */
    protected $plasticCard;
    /**
     * Transaction identification data.
     *
     * @type Identification
     * @since 0.1.0
     */
    protected $identification;
    /**
     * Customer data aggregator.
     *
     * @type Customer
     * @since 0.1.0
     */
    protected $customer;

    public function validate()
    {
        $this->assertAllPropertiesSet();
        $this->securityDetails->assertAllPropertiesSet();
        // credentials are set by default
        $this->paymentDetails->assertAllPropertiesSet();
        $this->plasticCard->assertAllPropertiesSet();
        $this
            ->customer
            ->getAddress()
            ->assertAllPropertiesSetExcept(array('state',));
        $this
            ->customer
            ->getContacts()
            ->assertPropertiesSet(array('ip', 'email'));
        $this
            ->customer
            ->getPersonalDetails()
            ->assertPropertiesSet(array('given', 'family',));
    }
}
