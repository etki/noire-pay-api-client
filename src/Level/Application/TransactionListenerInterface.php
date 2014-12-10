<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Entity\Transaction;

/**
 * Observes transactions.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
interface TransactionListenerInterface
{
    /**
     * Observes transaction.
     *
     * @param Transaction $transaction Transaction to observe,
     *
     * @return void
     * @since 0.1.0
     */
    public function observeTransaction(Transaction $transaction);
}
