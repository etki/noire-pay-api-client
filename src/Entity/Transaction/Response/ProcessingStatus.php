<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction\Response;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use DateTime;

/**
 * Processing details.
 *
 * @method $this setCode(string $code)
 * @method string getCode()
 * @method $this setResult(string $result)
 * @method string getResult()
 * @method $this setStatusCode(string $statusCode)
 * @method string getStatusCode()
 * @method $this setStatus(string $status)
 * @method string getStatus()
 * @method $this setReasonCode(string $reasonCode)
 * @method string getReasonCode()
 * @method $this setReason(string $reason)
 * @method string getReason()
 * @method $this setReturnCode(string $returnCode)
 * @method string getReturnCode()
 * @method $this setReturn(string $return)
 * @method string getReturn()
 * @method $this setRiskScore(string $riskScore)
 * @method string getRiskScore()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction\Response
 * @author  Etki <etki@etki.name>
 */
class ProcessingStatus extends AbstractEntity
{
    /**
     * Resulting code.
     *
     * @type string
     * @since 0.1.0
     */
    protected $code;
    /**
     * Processing timestamp.
     *
     * @type DateTime
     * @since 0.1.0
     */
    protected $timestamp;
    /**
     * ACK/NOK status.
     *
     * @type string
     * @since 0.1.0
     */
    protected $result;
    /**
     * Status code.
     *
     * @type string
     * @since 0.1.0
     */
    protected $statusCode;
    /**
     * Status message.
     *
     * @type string
     * @since 0.1.0
     */
    protected $status;
    /**
     * Transaction result in simple XX.XX code.
     *
     * @type string
     * @since 0.1.0
     */
    protected $reasonCode;
    /**
     * Short description of transaction result.
     *
     * @type string
     * @since 0.1.0
     */
    protected $reason;
    /**
     * ID of transaction.
     *
     * @type string
     * @since 0.1.0
     */
    protected $returnCode;
    /**
     * Return message.
     *
     * @type string
     * @since 0.1.0
     */
    protected $return;
    /**
     * Risk management score.
     *
     * @type string
     * @since 0.1.0
     */
    protected $riskScore;
    /**
     * `Acknowleged` (all ok) status code
     *
     * @type string
     * @since 0.1.0
     */
    const RESULT_ACK = 'ACK';
    /**
     * `Not OK` status code.
     *
     * @type string
     * @since 0.1.0
     */
    const RESULT_NOK = 'NOK';

    /**
     * Timestamp setter.
     *
     * @param string|DateTime $timestamp Timestamp to set.
     *
     * @return $this Current instance.
     * @since 0.1.0
     */
    public function setTimestamp($timestamp)
    {
        if (!($timestamp instanceof DateTime)) {
            $timestamp = new DateTime($timestamp);
        }
        $this->timestamp = $timestamp;
        return $this;
    }

    /**
     * Returns timestamp.
     *
     * @return DateTime
     * @since 0.1.0
     */
    public function getTimestamp()
    {
        if (!$this->timestamp) {
            return $this->timestamp;
        }
        return $this->timestamp;
    }
}
