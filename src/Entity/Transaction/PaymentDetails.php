<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * This entity represents payment data.
 *
 * @method string getCode()
 * @method $this setCode(string $code)
 * @method $this setAmount(float $amount)
 * @method string getCurrency()
 * @method $this setCurrency(string $currency)
 * @method string getUsage()
 * @method $this setUsage(string $usage)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class PaymentDetails extends AbstractEntity
{
    /**
     * Payment code, typically `DD.DB`
     *
     * @type string
     * @since 0.1.0
     */
    protected $code;
    /**
     * Amount to pay.
     *
     * @type float|string
     * @since 0.1.0
     */
    protected $amount;
    /**
     * Currency, typically EUR.
     *
     * @type string
     * @since 0.1.0
     */
    protected $currency;
    /**
     * Custom string.
     *
     * @type string
     * @since 0.1.0
     */
    protected $usage;

    /**
     * Custom getter for amount.
     *
     * @return float|string
     * @since 0.1.0
     */
    public function getAmount()
    {
        if (is_float($this->amount)) {
            $amount = rtrim(number_format($this->amount, 100, '.', ''), '0');
            $this->amount = $amount;
        }
        return $this->amount;
    }
}
