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
    const BRAND_4B = '4B';
    const BRAND_ADVANTAGE = 'ADVANTAGE';
    const BRAND_AMERICAN_EXPRESS = 'AMEX';
    const BRAND_ASYACARD = 'ASYACARD';
    const BRAND_AXESS = 'AXESS';
    const BRAND_BONUS = 'BONUS';
    const BRAND_CABAL = 'CABAL';
    const BRAND_CARDFINANS = 'CARDFINANS';
    const BRAND_CARTE_BANCAIRE = 'CARTEBANCAIRE';
    const BRAND_CARTE_BLEUE = 'CARTEBLEUE';
    const BRAND_DANKORT = 'DANKORT';
    const BRAND_DELTA = 'DELTA';
    const BRAND_DINERS = 'DINERS';
    const BRAND_DISCOVER = 'DISCOVER';
    const BRAND_ELO = 'ELO';
    const BRAND_EURO6000 = 'EURO6000';
    const BRAND_HIPERCARD = 'HIPERCARD';
    const BRAND_JCB = 'JCB';
    const BRAND_LASER_CARD = 'LASER';
    const BRAND_MAESTRO = 'MAESTRO';
    const BRAND_MASTERCARD = 'MASTER';
    const BRAND_MASTERPASS = 'MASTERPASS';
    const BRAND_MAXIMUM = 'MAXIMUM';
    const BRAND_PAYFAIR = 'PAYFAIR';
    const BRAND_POSTFINANCE_KARTE_DIRECT = 'PF_KARTE_DIRECT';
    const BRAND_POSTEPAY = 'POSTEPAY';
    const BRAND_SERVIRED = 'SERVIRED';
    const BRAND_SOLO = 'SOLO';
    const BRAND_SWITCH = 'SWITCH';
    const BRAND_VISA = 'VISA';
    const BRAND_VISA_DEBIT = 'VISADEBIT';
    const BRAND_VISA_ELECTRON = 'VISAELECTRON';
    const BRAND_VPAY = 'VPAY';
    const BRAND_WORLD = 'WORLD';
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
