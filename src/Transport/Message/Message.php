<?php

namespace Etki\Api\Clients\NoirePay\Transport\Message;

use Etki\Api\Clients\NoirePay\Entity\Transaction;
use Etki\Api\Clients\NoirePay\Entity\Transmission\Credentials;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityData;
use Etki\Api\Clients\NoirePay\Entity\Transmission\TransmissionDetails;

/**
 * This class encapsulates message transferred to Noire Pay API.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Transport\Message
 * @author  Etki <etki@etki.name>
 */
class Message
{
    /**
     * Message data.
     *
     * @type array
     * @since 0.1.0
     */
    protected $data = array();
    /**
     * Order in which sections are present in document.
     *
     * @type array
     * @since 0.1.0
     */
    protected $sectionOrder = array(
        'request',
        'security',
        'user',
        'transaction',
        'identification',
        'payment',
        'presentation',
        'account',
        'name',
        'address',
        'contact',
    );

    /**
     * Returns data.
     *
     * @return array
     * @since 0.1.0
     */
    public function getData()
    {
        $data = array();
        foreach ($this->sectionOrder as $sectionKey) {
            $sectionKey = strtoupper($sectionKey);
            if (isset($this->data[$sectionKey])) {
                $data[$sectionKey] = $this->data[$sectionKey];
            }
        }
        return $data;
    }

    /**
     * Data setter.
     *
     * @param array $data Data to set.
     *
     * @return void
     * @since 0.1.0
     */
    public function setData(array $data)
    {
        $this->data = $data;
    }

    /**
     * Sets single section item.
     *
     * @param string $sectionKey Section key.
     * @param string $itemKey    Item key.
     * @param string $value      Item value.
     *
     * @return void
     * @since 0.1.0
     */
    public function setSectionItem($sectionKey, $itemKey, $value)
    {
        if ($value === null) {
            return;
        }
        $sectionKey = strtoupper($sectionKey);
        $itemKey = strtoupper($itemKey);
        if (!isset($this->data[$sectionKey])) {
            $this->data[$sectionKey] = array();
        }
        $this->data[$sectionKey][$itemKey] = (string) $value;
    }

    /**
     * Creates message from transaction.
     *
     * @param Transaction $transaction
     *
     * @todo refactor
     *
     * @return Message New message.
     * @since 0.1.0
     */
    public static function createFromTransaction(Transaction $transaction)
    {
        $message = new static;
        $card = $transaction->getPlasticCard();
        $message->setSectionItem('account', 'number', $card->getNumber());
        $message->setSectionItem('account', 'brand', $card->getBrand());
        $message->setSectionItem(
            'account',
            'expiry_month',
            $card->getExpiryMonth()
        );
        $message->setSectionItem(
            'account',
            'expiry_year',
            $card->getExpiryYear()
        );
        $message->setSectionItem(
            'account',
            'verification',
            $card->getSecurityNumber()
        );

        $payment = $transaction->getPaymentDetails();
        $message->setSectionItem('payment', 'code', $payment->getCode());
        $message->setSectionItem(
            'presentation',
            'amount',
            $payment->getAmount()
        );
        $message->setSectionItem(
            'presentation',
            'currency',
            $payment->getCurrency()
        );
        $message->setSectionItem('presentation', 'usage', $payment->getUsage());

        $identification = $transaction->getIdentification();
        $message->setSectionItem(
            'identification',
            'transactionid',
            $identification->getTransactionId()
        );
        $message->setSectionItem(
            'identification',
            'uniqueid',
            $identification->getUniqueId()
        );
        $message->setSectionItem(
            'identification',
            'shortid',
            $identification->getShortId()
        );
        $message->setSectionItem(
            'identification',
            'referenceId',
            $identification->getReferenceId()
        );
        $message->setSectionItem(
            'identification',
            'shopperId',
            $identification->getShopperId()
        );
        $message->setSectionItem(
            'identification',
            'invoiceId',
            $identification->getInvoiceId()
        );

        return $message;
    }

    /**
     * Sets security data.
     *
     * @param SecurityData $data
     *
     * @return void
     * @since 0.1.0
     */
    public function setSecurityData(SecurityData $data)
    {
        $this->setSectionItem('security', 'sender', $data->getSender());
    }

    /**
     * Sets credentials data.
     *
     * @param Credentials $credentials
     *
     * @return void
     * @since 0.1.0
     */
    public function setCredentials(Credentials $credentials)
    {
        $this->setSectionItem('user', 'login', $credentials->getLogin());
        $this->setSectionItem('user', 'password', $credentials->getPassword());
    }

    /**
     * Sets transmission details.
     *
     * @param TransmissionDetails $details Details.
     *
     * @return void
     * @since 0.1.0
     */
    public function setTransmissionDetails(TransmissionDetails $details)
    {
        $this->setSectionItem('transaction', 'mode', $details->getMode());
        $this->setSectionItem(
            'transaction',
            'response',
            $details->getResponse()
        );
        $this->setSectionItem('transaction', 'channel', $details->getChannel());
    }
}
