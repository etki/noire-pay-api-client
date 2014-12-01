<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 * Transaction identification details.
 *
 * @method string getTransactionId()
 * @method $this setTransactionId(string $transactionId)
 * @method string getUniqueId()
 * @method $this setUniqueId(string $uniqueId)
 * @method string getShortId()
 * @method $this setShortId(string $shortId)
 * @method string getReferenceId()
 * @method $this setReferenceId(string $referenceId)
 * @method string getShopperId()
 * @method $this setShopperId(string $shopperId)
 * @method string getInvoiceId()
 * @method $this setInvoiceId(string $invoiceId)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class Identification extends AbstractEntity
{
    /**
     * Transaction ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $transactionId;
    /**
     * Unique ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $uniqueId;
    /**
     * Short ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $shortId;
    /**
     * Transaction reference ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $referenceId;
    /**
     * Shopper ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $shopperId;
    /**
     * Invoice ID.
     *
     * @type string
     * @since 0.1.0
     */
    protected $invoiceId;
}
