<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction\Request;

use InvalidArgumentException;

/**
 * Allows to set custom criterion for request.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction\Request
 * @author  Etki <etki@etki.name>
 */
class Criterion
{
    /**
     * Criterion data.
     *
     * @type string[]
     * @since 0.1.0
     */
    protected $data;

    /**
     * Sets data item.
     *
     * @param string $key   Data item key.
     * @param string $value Data item value.
     *
     * @return void
     * @since 0.1.0
     */
    public function setDataItem($key, $value)
    {
        $this->assertLengthNotBiggerThan($key, 32);
        $this->assertLengthNotBiggerThan($value, 1024);
        $this->data[$key] = $value;
    }

    /**
     * Retrieves data item by key.
     *
     * @param string $key
     *
     * @return null|string
     * @since 0.1.0
     */
    public function getDataItem($key)
    {
        $this->assertLengthNotBiggerThan($key, 32);
        return isset($this->data[$key]) ? $this->data[$key] : null;
    }

    /**
     * Returns data in [key => value] format.
     *
     * @return string[]
     * @since 0.1.0
     */
    public function getData()
    {
        return $this->data;
    }

    /**
     * Asserts that particular value is not bigger than <length limit>.
     *
     * @param string $value       Argument value.
     * @param int    $lengthLimit Maximum allowed length.
     *
     * @return void
     * @since 0.1.0
     */
    protected function assertLengthNotBiggerThan($value, $lengthLimit)
    {
        if (strlen($value) > $lengthLimit) {
            $message = 'Argument exceeds max allowed length of ' . $lengthLimit;
            throw new InvalidArgumentException($message);
        }
    }
}
