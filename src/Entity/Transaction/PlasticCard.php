<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * This entity represents single card.
 *
 * @method $this setNumber(string $number)
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
}
