<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Customer data holder.
 *
 * @method $this setAddress(CustomerAddress $address)
 * @method CustomerAddress getAddress()
 * @method $this setContacts(CustomerContacts $contacts)
 * @method CustomerContacts getContacts()
 * @method $this setPersonalDetails(CustomerPersonalDetails $personalDetails)
 * @method CustomerPersonalDetails getPersonalDetails()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class Customer extends AbstractEntity
{
    /**
     * Customer address.
     *
     * @type CustomerAddress
     * @since 0.1.0
     */
    protected $address;
    /**
     * Customer contacts (IP, email, etc.).
     *
     * @type CustomerContacts
     * @since 0.1.0
     */
    protected $contacts;
    /**
     * Personal details (name, sex, birth date, etc.).
     *
     * @type CustomerPersonalDetails
     * @since 0.1.0
     */
    protected $personalDetails;
}
