<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use Etki\Api\Clients\NoirePay\Utility\CardNumberFormatter;
use Etki\Api\Clients\NoirePay\Utility\ExpirationDateParser;

/**
 * This entity represents single card.
 *
 * @method $this setHolder(string $holder)
 * @method string getHolder()
 * setNumber() is implemented in usual way
 * @method string getNumber()
 * @method $this setBrand(string $brand)
 * @method string getBrand()
 * @method $this setExpiryMonth(int $expiryMonth)
 * @method int getExpiryMonth()
 * @method $this setExpiryYear(int $expiryYear)
 * @method int getExpiryYear()
 * @method $this setSecurityNumber(int $securityNumber)
 * @method int getSecurityNumber()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class PlasticCard extends AbstractEntity
{
    /**
     * Card holder.
     *
     * @type string
     * @since 0.1.0
     */
    protected $holder;
    /**
     * Card number.
     *
     * @type string
     * @since 0.1.0
     */
    protected $number;
    /**
     * Card brand.
     *
     * @type string
     * @since 0.1.0
     */
    protected $brand;
    /**
     * Expiration month.
     *
     * @type int
     * @since 0.1.0
     */
    protected $expiryMonth;
    /**
     * Expiration year.
     *
     * @type int
     * @since 0.1.0
     */
    protected $expiryYear;
    /**
     * Plastic card security number.
     *
     * @type int
     * @since 0.1.0
     */
    protected $securityNumber;

    /**
     * Sets card number.
     *
     * @param string $number Card number.
     *
     * @return $this
     * @since 0.1.0
     */
    public function setNumber($number)
    {
        $this->number = CardNumberFormatter::formatCardNumber($number);
        return $this;
    }

    /**
     * Parses expiration date and sets corresponding fields.
     *
     * @param string $date Date to set.
     *
     * @return void
     * @since 0.1.0
     */
    public function setExpiryDate($date)
    {
        $expiry = ExpirationDateParser::parseDate($date);
        $this->expiryMonth = $expiry['month'];
        $this->expiryYear = $expiry['year'];
    }
}
