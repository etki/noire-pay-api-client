<?php

namespace Etki\Api\Clients\NoirePay\Entity;

use Etki\Api\Clients\NoirePay\Entity\Transaction\PlasticCard;
use Etki\Api\Clients\NoirePay\Entity\Transaction\PaymentDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Identification;

/**
 * Transaction wrapper.
 *
 * @method PlasticCard getPlasticCard()
 * @method $this setPlasticCard(PlasticCard $plasticCard)
 * @method PaymentDetails getPaymentDetails()
 * @method $this setPaymentDetails(PaymentDetails $paymentData)
 * @method Identification getIdentification()
 * @method $this setIdentification(Identification $identification)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class Transaction extends AbstractEntity
{
    /**
     * User card data.
     *
     * @type PlasticCard
     * @since 0.1.0
     */
    protected $plasticCard;
    /**
     * Payment data.
     *
     * @type PaymentDetails
     * @since 0.1.0
     */
    protected $paymentDetails;

    /**
     * Transaction identification data.
     *
     * @type Identification
     * @since 0.1.0
     */
    protected $identification;

    /**
     * Validates transaction.
     *
     * @return void
     * @since 0.1.0
     */
    public function validate()
    {
        $this->assertPropertiesSet(array('plasticCard', 'paymentDetails',));
        $this->paymentDetails->assertAllPropertiesSet();
        $this->plasticCard->assertAllPropertiesSet();
    }
}
