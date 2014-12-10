<?php

namespace Etki\Api\Clients\NoirePay\Entity;

use Etki\Api\Clients\NoirePay\Level\Application\TransactionConfirmation;
use Etki\Api\Clients\NoirePay\Level\Application\TransactionRequest;

/**
 * Transaction wrapper.
 *
 * @method $this setTransactionRequest(TransactionRequest $request)
 * @method TransactionRequest getTransactionRequest()
 * @method $this setTransactionConfirmation()
 * @method TransactionConfirmation getTransactionConfirmation()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class Transaction extends AbstractEntity
{
    /**
     * Transaction request.
     *
     * @type TransactionRequest
     * @since 0.1.0
     */
    protected $transactionRequest;
    /**
     * Transaction confirmation.
     *
     * @type TransactionConfirmation
     * @since 0.1.0
     */
    protected $transactionConfirmation;
}
