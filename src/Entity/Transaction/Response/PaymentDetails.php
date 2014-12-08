<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction\Response;

use Etki\Api\Clients\NoirePay\Entity\Transaction\PaymentDetails
    as BasePaymentDetails;

/**
 * Response payment details.
 *
 * @method $this setClearingAmount(string $clearingAmount)
 * @method string getClearingAmount()
 * @method $this setClearingCurrency(string $clearingCurrency)
 * @method string getClearingCurrency()
 * @method $this setClearingDescriptor(string $clearingDescriptor)
 * @method string getClearingDescriptor()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction\Response
 * @author  Etki <etki@etki.name>
 */
class PaymentDetails extends BasePaymentDetails
{
    /**
     * String-represented float amount of cleared payment.
     *
     * @type string
     * @since 0.1.0
     */
    protected $clearingAmount;
    /**
     * Currency.
     *
     * @type string
     * @since 0.1.0
     */
    protected $clearingCurrency;
    /**
     * Clearing description.
     *
     * @type string
     * @since 0.1.0
     */
    protected $clearingDescriptor;
}
