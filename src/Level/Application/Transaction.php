<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;

/**
 *
 *
 * @method $this setRequest(TransactionRequest $request)
 * @method TransactionRequest getRequest()
 * @method $this setConfirmation(TransactionConfirmation $confirmation)
 * @method int getTimestamp()
 * @method $this setTimestamp(int $timestamp)
 * @method bool getSuccess()
 * @method $this setSuccess(bool $success)
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
class Transaction extends AbstractEntity
{
    /**
     * Request sent to server.
     *
     * @type TransactionRequest
     * @since 0.1.0
     */
    protected $request;
    /**
     * Transaction confirmation that came from server.
     *
     * @type TransactionConfirmation
     * @since 0.1.0
     */
    protected $confirmation;
    /**
     * Response timestamp.
     *
     * @type int
     * @since 0.1.0
     */
    protected $timestamp;
    /**
     * Operation success.
     *
     * @type bool
     * @since 0.1.0
     */
    protected $success;
}
