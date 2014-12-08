<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Holds all customer data.
 *
 * @method $this setPhone(string $phone)
 * @method string getPhone()
 * @method $this setMobile(string $mobile);
 * @method string getMobile()
 * @method $this setEmail(string $email)
 * @method string getEmail()
 * @method $this setIp(string $ip)
 * @method string getIp()
 *
 * @SuppressWarnings(PHPMD.ShortVariableName)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class CustomerContacts extends AbstractEntity
{
    /**
     * Contact phone.
     *
     * @type string
     * @since 0.1.0
     */
    protected $phone;
    /**
     * Contact mobile phone.
     *
     * @type string
     * @since 0.1.0
     */
    protected $mobile;
    /**
     * Contact email.
     *
     * @type string
     * @since 0.1.0
     */
    protected $email;
    /**
     * Customer IP.
     *
     * @type string
     * @since 0.1.0
     */
    protected $ip;
}
