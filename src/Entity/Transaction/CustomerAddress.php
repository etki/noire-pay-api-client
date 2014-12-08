<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Customer address.
 *
 * @method $this setCountry(string $country)
 * @method string getCountry()
 * @method $this setState(string $state)
 * @method string getState()
 * @method $this setCity(string $city)
 * @method string getCity()
 * @method $this setZip(string $zip)
 * @method string getZip()
 * @method $this setStreet(string $street)
 * @method string getStreet()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class CustomerAddress extends AbstractEntity
{
    /**
     * Customer country (2-letter ISO 3166 code).
     *
     * @type string
     * @since 0.1.0
     */
    protected $country;
    /**
     * Customer state (optional).
     *
     * @type string
     * @since 0.1.0
     */
    protected $state;
    /**
     * Customer city.
     *
     * @type string
     * @since 0.1.0
     */
    protected $city;
    /**
     * Customer postal code.
     *
     * @type string
     * @since 0.1.0
     */
    protected $zip;
    /**
     * Street / building.
     *
     * @type string
     * @since 0.1.0
     */
    protected $street;
}
