<?php

namespace Etki\Api\Clients\NoirePay\Transport\Message;

use Etki\Api\Clients\NoirePay\Entity\Transaction;
use Etki\Api\Clients\NoirePay\Entity\Transmission\Credentials;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;
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

    public function getDataAsPlainArray()
    {
        $data = array();
        foreach ($this->data as $sectionKey => $sectionData) {
            foreach ($sectionData as $key => $value) {
                $data[$sectionKey . '.' . $key] = $value;
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
        $request = $transaction->getTransactionRequest();
        $card = $request->getPlasticCard();
        $message->setSectionItem('account', 'holder', $card->getHolder());
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

        $payment = $request->getPaymentDetails();
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

        $identification = $request->getIdentification();
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

        $message->setSectionItem(
            'name',
            'given',
            $request->getCustomer()->getPersonalDetails()->getGivenName()
        );
        $message->setSectionItem(
            'name',
            'family',
            $request->getCustomer()->getPersonalDetails()->getFamilyName()
        );
        $message->setSectionItem(
            'name',
            'salutation',
            $request->getCustomer()->getPersonalDetails()->getSalutation()
        );
        $message->setSectionItem(
            'name',
            'title',
            $request->getCustomer()->getPersonalDetails()->getTitle()
        );
        $message->setSectionItem(
            'name',
            'company',
            $request->getCustomer()->getPersonalDetails()->getTitle()
        );

        $address = $request->getCustomer()->getAddress();
        $message->setSectionItem('address', 'street', $address->getStreet());
        $message->setSectionItem('address', 'zip', $address->getZip());
        $message->setSectionItem('address', 'city', $address->getCity());
        $message->setSectionItem('address', 'state', $address->getState());
        $message->setSectionItem('address', 'country', $address->getCountry());

        $contact = $request->getCustomer()->getContacts();
        $message->setSectionItem('contact', 'email', $contact->getEmail());
        $message->setSectionItem('contact', 'ip', $contact->getEmail());

        return $message;
    }

    /**
     * Sets security data.
     *
     * @param SecurityDetails $data
     *
     * @return void
     * @since 0.1.0
     */
    public function setSecurityData(SecurityDetails $data)
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
        $this->setSectionItem('user', 'pwd', $credentials->getPassword());
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
