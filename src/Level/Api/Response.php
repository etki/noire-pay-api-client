<?php

namespace Etki\Api\Clients\NoirePay\Level\Api;

use BadMethodCallException;

/**
 * API response.
 *
 * @method $this setData(array $data)
 * @method array getData()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Level\Api
 * @author  Etki <etki@etki.name>
 */
class Response
{
    /**
     * Response data.
     *
     * @type string[]
     * @since 0.1.0
     */
    protected $data;

    /**
     * Retrieves data item.
     *
     * @param string $key Item key in `section.key` format.
     *
     * @return mixed
     * @since 0.1.0
     */
    public function getDataItem($key)
    {
        $chunks = explode('.', strtoupper($key));
        $sectionKey = array_shift($chunks);
        $key = implode('.', $chunks);
        if (!isset($this->data[$sectionKey], $this->data[$sectionKey][$key])) {
            throw new BadMethodCallException('Unknown item');
        }
        return $this->data[$sectionKey][$key];
    }
}
