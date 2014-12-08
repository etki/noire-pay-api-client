<?php

namespace Etki\Api\Clients\NoirePay\Level\Application;

use Etki\Api\Clients\NoirePay\Entity\Transaction\Identification;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\PaymentDetails;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\ProcessingStatus;
use Etki\Api\Clients\NoirePay\Entity\Transaction\Response\Verification;
use Etki\Api\Clients\NoirePay\Entity\Transmission\TransmissionDetails;
use Etki\Api\Clients\NoirePay\Entity\Transmission\SecurityDetails;
use Etki\Api\Clients\NoirePay\Level\Api\Parser;
use Etki\Api\Clients\NoirePay\Level\Api\Response;
use Etki\Api\Clients\NoirePay\Level\Api\Request;

/**
 * Application level converter. Converts API and application level messages.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Application
 * @author  Etki <etki@etki.name>
 */
class Converter
{
    /**
     * Private constructor, only static calls allowed.
     *
     * @return self
     * @since 0.1.0
     */
    private function __construct()
    {
    }

    /**
     * Converts transaction request into API request.
     *
     * @param TransactionRequest $request
     *
     * @SuppressWarnings(PHPMD.LongVariableName)
     *
     * @todo refactor ffs
     *
     * @return Request Created API request.
     * @since 0.1.0
     */
    public static function convertTransactionRequest(
        TransactionRequest $request
    ) {
        $securityDetails = $request->getSecurityDetails();
        $credentials = $request->getCredentials();
        $transmissionDetails = $request->getTransmissionDetails();
        $identification = $request->getIdentification();
        $paymentDetails = $request->getPaymentDetails();
        $plasticCard = $request->getPlasticCard();
        $customerPersonalDetails = $request
            ->getCustomer()
            ->getPersonalDetails();
        $customerAddress = $request->getCustomer()->getAddress();
        $customerContacts = $request->getCustomer()->getContacts();

        $apiRequest = new Request;
        $apiRequest->setDataItem('request.version', '1.0');
        $apiRequest->setDataItem(
            'security.sender',
            $securityDetails->getSender()
        );
        $apiRequest->setDataItem('user.login', $credentials->getLogin());
        $apiRequest->setDataItem('user.pwd', $credentials->getPassword());

        $apiRequest->setDataItem(
            'transaction.mode',
            $transmissionDetails->getMode()
        );
        $apiRequest->setDataItem(
            'transaction.response',
            $transmissionDetails->getResponse()
        );
        $apiRequest->setDataItem(
            'transaction.channel',
            $transmissionDetails->getChannel()
        );
        $keys = array('transactionId',);
        foreach ($keys as $key) {
            $method = 'get' . ucfirst($key);
            $value = call_user_func(array($identification, $method));
            if ($value) {
                $apiRequest->setDataItem('identification.' . $key, $value);
            }
        }
        $apiRequest->setDataItem('payment.code', $paymentDetails->getCode());
        $apiRequest->setDataItem(
            'presentation.amount',
            $paymentDetails->getAmount()
        );
        $apiRequest->setDataItem(
            'presentation.currency',
            $paymentDetails->getCurrency()
        );
        $apiRequest->setDataItem(
            'presentation.usage',
            $paymentDetails->getUsage()
        );
        $apiRequest->setDataItem('account.holder', $plasticCard->getHolder());
        $apiRequest->setDataItem('account.number', $plasticCard->getNumber());
        $apiRequest->setDataItem('account.brand', $plasticCard->getBrand());
        $apiRequest->setDataItem(
            'account.expiry_month',
            $plasticCard->getExpiryMonth()
        );
        $apiRequest->setDataItem(
            'account.expiry_year',
            $plasticCard->getExpiryYear()
        );
        $apiRequest->setDataItem(
            'account.verification',
            $plasticCard->getSecurityNumber()
        );

        $apiRequest->setDataItem(
            'name.given',
            $customerPersonalDetails->getGivenName()
        );
        $apiRequest->setDataItem(
            'name.family',
            $customerPersonalDetails->getFamilyName()
        );

        $apiRequest->setDataItem(
            'address.country',
            $customerAddress->getCountry()
        );
        $apiRequest->setDataItem('address.city', $customerAddress->getCity());
        $apiRequest->setDataItem(
            'address.street',
            $customerAddress->getStreet()
        );
        $apiRequest->setDataItem('address.zip', $customerAddress->getZip());

        $apiRequest->setDataItem('contact.ip', $customerContacts->getIp());
        $apiRequest->setDataItem(
            'contact.email',
            $customerContacts->getEmail()
        );
    }

    /**
     * Converts API response into transaction confirmation.
     *
     * @param Response $response Response to convert.
     *
     * @return TransactionConfirmation Created entity.
     * @since 0.1.0
     */
    public static function convertApiResponse(Response $response)
    {
        $confirmation = new TransactionConfirmation;

        $securityDetails = new SecurityDetails;
        $transmissionDetails = new TransmissionDetails;
        $identification = new Identification;
        $processingStatus = new ProcessingStatus;
        $paymentDetails = new PaymentDetails;
        $verification = new Verification;

        $securityDetails->setSender($response->getDataItem('security.sender'));

        $transmissionDetails->setChannel(
            $response->getDataItem('transaction.channel')
        );
        $transmissionDetails->setMode(
            $response->getDataItem('transaction.mode')
        );
        $transmissionDetails->setResponse(
            $response->getDataItem('transaction.response')
        );

        $identification->setTransactionId(
            $response->getDataItem('identification.transactionId')
        );
        $identification->setUniqueId(
            $response->getDataItem('identification.uniqueId')
        );
        $identification->setShortId(
            $response->getDataItem('identification.shortId')
        );

        $processingStatus->setCode($response->getDataItem('processing.code'));
        $processingStatus->setTimestamp($response->getDataItem('processing.timestamp'));
        $processingStatus->setResult($response->getDataItem('processing.result'));
        $processingStatus->setStatusCode($response->getDataItem('processing.statusCode'));
        $processingStatus->setStatus($response->getDataItem('processing.status'));
        $processingStatus->setReasonCode($response->getDataItem('processing.reasonCode'));
        $processingStatus->setReason($response->getDataItem('processing.reason'));
        $processingStatus->setReturnCode($response->getDataItem('processing.returnCode'));
        $processingStatus->setReturn($response->getDataItem('processing.return'));

        $paymentDetails->setCode($response->getDataItem('payment.code'));
        $paymentDetails->setAmount($response->getDataItem('presentation.amount'));
        $paymentDetails->setCurrency($response->getDataItem('presentation.currency'));
        $paymentDetails->setUsage($response->getDataItem('presentation.usage'));
        $paymentDetails->setClearingAmount($response->getDataItem('clearing.amount'));
        $paymentDetails->setClearingCurrency($response->getDataItem('clearing.currency'));
        $paymentDetails->setClearingDescriptor($response->getDataItem('clearing.descriptor'));

        $verification->setSecurityHash($response->getDataItem('security.hash'));

        $confirmation->setSecurityDetails($securityDetails);
        $confirmation->setTransmissionDetails($transmissionDetails);
        $confirmation->setIdentification($identification);
        $confirmation->setProcessingStatus($processingStatus);
        $confirmation->setPaymentDetails($paymentDetails);
        $confirmation->setVerification($verification);

        return $confirmation;
    }
}
