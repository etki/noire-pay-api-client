<?php

namespace Etki\Api\Clients\NoirePay\Level\Api;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use Etki\Api\Clients\NoirePay\Exception\Level\Api\InvalidSectionKeyException;

/**
 * API request class.
 *
 * @method array getData()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Api
 * @author  Etki <etki@etki.name>
 */
class Request extends AbstractEntity
{
    /**
     * Request data.
     *
     * @type array
     * @since 0.1.0
     */
    protected $data;

    /**
     * Sets data in batch.
     *
     * @param array $data Data to set in [`sectionKey`.`itemKey` => `value`] or
     *                    in [`sectionKey` => [`itemKey` => `value`]] format.
     *
     * @return void
     * @since 0.1.0
     */
    public function setData(array $data)
    {
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach ($value as $valueKey => $realValue) {
                    $this->setDataItem($key . '.' . $valueKey, $realValue);
                }
            } else {
                $this->setDataItem($key, $value);
            }
        }
    }

    /**
     * Sets single data item.
     *
     * @param string $key   Dot-separated `sectionKey.itemKey` address.
     * @param mixed  $value Item value.
     *
     * @return void
     * @since 0.1.0
     */
    public function setDataItem($key, $value)
    {
        $chunks = explode('.', $key);
        if (sizeof($chunks) !== 2) {
            throw new InvalidSectionKeyException;
        }
        list($sectionKey, $itemKey) = $chunks;
        if (!isset($this->data[$sectionKey])) {
            $this->data[$sectionKey] = array();
        }
        $this->data[$sectionKey][$itemKey] = $value;
    }
}
