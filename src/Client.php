<?php

namespace Etki\Api\Clients\NoirePay;

use Etki\Api\Clients\NoirePay\Entity\Transaction;
use Etki\Api\Clients\NoirePay\Exception\Level\Application\UnsuccessfulResponseException;
use Etki\Api\Clients\NoirePay\Level\Application\TransactionConfirmation;
use Etki\Api\Clients\NoirePay\Level\Application\TransactionRequest;
use Etki\Api\Clients\NoirePay\Level\Http\HttpListenerInterface;
use Etki\Api\Clients\NoirePay\Level\Http\MessageListenerInterface;
use Etki\Api\Clients\NoirePay\Transport\TransportInterface;
use Etki\Api\Clients\NoirePay\Transport\Transport;
use Etki\Api\Clients\NoirePay\Transport\Message\Message;
use Etki\Api\Clients\NoirePay\Entity\Transmission\Credentials;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;
use Etki\Api\Clients\NoirePay\Entity\Transmission\TransmissionDetails;
use Etki\Api\Clients\NoirePay\Level\Application\TransactionListenerInterface;
use Guzzle\Common\Exception\BadMethodCallException;

/**
 * Noire Pay API Client.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay
 * @author  Etki <etki@etki.name>
 */
class Client
{
    /**
     * URL to send requests to.
     *
     * @type string
     * @since 0.1.0
     */
    protected $url;
    /**
     * Credentials data.
     *
     * @type Credentials
     * @since 0.1.0
     */
    protected $credentials;
    /**
     * Security data.
     *
     * @type SecurityDetails
     * @since 0.1.0
     */
    protected $securityDetails;
    /**
     * Transmission details.
     *
     * @type TransmissionDetails
     * @since 0.1.0
     */
    protected $transmissionDetails;
    /**
     * Transport
     *
     * @type TransportInterface
     * @since 0.1.0
     */
    protected $transport;
    /**
     * List of transaction listeners.
     *
     * @type TransactionListenerInterface[]
     * @since 0.1.0
     */
    protected $transactionListeners = array();

    /**
     * Simple initializer.
     *
     * @param string              $url                 URL to touch.
     * @param Credentials         $credentials         Access credentials.
     * @param SecurityDetails        $securityData        Security variables.
     * @param TransmissionDetails $transmissionDetails Transmission options.
     */
    public function __construct(
        $url,
        Credentials $credentials,
        SecurityDetails $securityData,
        TransmissionDetails $transmissionDetails
    ) {
        $this->url = $url;
        $this->credentials = $credentials;
        $this->securityDetails = $securityData;
        $this->transmissionDetails = $transmissionDetails;
        $this->transport = new Transport;
    }

    /**
     * Commits transaction.
     *
     * @param Transaction $transaction Transaction to commit.
     *
     * @return Transaction committed transaction.
     * @since 0.1.0
     */
    public function commitTransaction(Transaction $transaction)
    {
        try {
            $transaction->getTransactionRequest()->validate();
        } catch (BadMethodCallException $e) {
            $message = 'Malformed transaction: ' . $e->getMessage();
            $exception = new BadMethodCallException($message, 0, $e);
            throw $exception;
        }
        $transport = new Transport;
        $message = Message::createFromTransaction($transaction);
        $message->setSectionItem('request', 'version', '1.0');
        $message->setSecurityData($this->securityDetails);
        $message->setCredentials($this->credentials);
        $message->setTransmissionDetails($this->transmissionDetails);
        $response = $transport->sendMessage($this->url, $message);
        $transactionResponse = $response->createTransactionConfirmation();
        $transaction->setTransactionConfirmation($transactionResponse);
        $this->logTransaction($transaction);
        if ($transactionResponse->getProcessingStatus()->getReasonCode() !== '00'
            || $transactionResponse->getProcessingStatus()->getStatusCode() !== '90'
        ) {
            $exceptionMessage = sprintf(
                'Status code: %s, reason code: %s, status: %s, reason: %s',
                $transactionResponse->getProcessingStatus()->getStatusCode(),
                $transactionResponse->getProcessingStatus()->getReasonCode(),
                $transactionResponse->getProcessingStatus()->getStatus(),
                $transactionResponse->getProcessingStatus()->getReason()
            );
            throw new UnsuccessfulResponseException($exceptionMessage);
        }
        return $transaction;
    }

    /**
     * Allows setting particular transport.
     *
     * @param TransportInterface $transport Transport to set.
     *
     * @return void
     * @since 0.1.0
     */
    public function setTransport(TransportInterface $transport)
    {
        $this->transport = $transport;
    }

    /**
     * Sets new transaction listener.
     *
     * @param TransactionListenerInterface $listener Дшыеутук
     *
     * @return void
     * @since 0.1.0
     */
    public function setTransactionListener(
        TransactionListenerInterface $listener
    ) {
        $this->transactionListeners[] = $listener;
        $this->transactionListeners = array_unique($this->transactionListeners);
    }

    /**
     * Logs transaction.
     *
     * @param Transaction $transaction Transaction to listen.
     *
     * @return void
     * @since 0.1.0
     */
    protected function logTransaction(Transaction $transaction)
    {
        foreach ($this->transactionListeners as $listener) {
            $listener->observeTransaction($transaction);
        }
    }

    /**
     * Creates initialized transaction request.
     *
     * @return Transaction
     * @since 0.1.0
     */
    public function createTransaction()
    {
        $transactionRequest = new TransactionRequest;
        $transactionRequest->setCredentials($this->credentials);
        $transactionRequest->setSecurityDetails($this->securityDetails);
        $transactionRequest->setTransmissionDetails($this->transmissionDetails);
        $transaction = new Transaction;
        $transaction->setTransactionRequest($transactionRequest);
        return $transaction;
    }

    /**
     * Sets HTTP listener.
     *
     * @param HttpListenerInterface $listener Listener.
     *
     * @return void
     * @since 0.1.0
     */
    public function setHttpListener(HttpListenerInterface $listener)
    {
        $this->transport->setListener($listener);
    }

    /**
     * Sets message listener.
     *
     * @param MessageListenerInterface $listener Listener to set,
     *
     * @return void
     * @since 0.1.0
     */
    public function setMessageListener(MessageListenerInterface $listener)
    {
        $this->transport->setMessageListener($listener);
    }
}
