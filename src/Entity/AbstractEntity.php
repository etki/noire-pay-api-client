<?php

namespace Etki\Api\Clients\NoirePay\Entity;

use Guzzle\Common\Exception\BadMethodCallException;

/**
 * This class contains all basic functionality for a single entity.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class AbstractEntity
{
    /**
     * Getter and setter functionality.
     *
     * @param string $method Method that gets called.
     * @param array  $args   Arguments.
     *
     * @SuppressWarnings(PHPMD.UnusedFormalParameter)
     *
     * @return mixed|$this Property value for getters, current instance for
     * setters.
     * @since 0.1.0
     */
    public function __call($method, array $args)
    {
        $prefix = substr($method, 0, 3);
        $property = strtolower(substr($method, 3, 1)) . substr($method, 4);
        if (!in_array($prefix, array('get', 'set',))
            || !property_exists($this, $property)
        ) {
            $message = sprintf('Unknown method `%s`', $method);
            throw new BadMethodCallException($message);
        }
        if ($prefix === 'get') {
            return $this->$property;
        }
        if (sizeof($args) < 1) {
            throw new BadMethodCallException('Setter requires a value');
        }
        $this->$property = $args[0];
        return $this;
    }

    /**
     * Asserts that particular property is set.
     *
     * @param string $propertyName Name of the property to check.
     *
     * @throws BadMethodCallException Thrown if property isn't set.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertPropertySet($propertyName)
    {
        if (!isset($this->$propertyName)) {
            $message = sprintf(
                'Required property `%s` isn\'t set',
                $propertyName
            );
            throw new BadMethodCallException($message);
        }
    }

    /**
     * Asserts that particular properties are set.
     *
     * @param string[] $propertyNames List of property names to check
     *
     * @throws BadMethodCallException Thrown if any of specified properties
     * isn't set.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertPropertiesSet(array $propertyNames)
    {
        $missing = array();
        foreach ($propertyNames as $propertyName) {
            if (!isset($this->$propertyName)) {
                $missing[] = $propertyName;
            }
        }
        if (!$missing) {
            return;
        }
        $message = 'Following required properties are not set: ' .
            implode(', ', $propertyNames);
        throw new BadMethodCallException($message);
    }

    /**
     * Asserts that all properties are set except for specified ones.
     *
     * @param string[] $excludedPropertyNames List of property names not to
     *                                        check.
     *
     * @SuppressWarnings(PHPMD.LongVariable)
     *
     * @return void
     * @since 0.1.0
     */
    public function assertAllPropertiesSetExcept(array $excludedPropertyNames)
    {
        $allPropertyNames = array_keys(get_object_vars($this));
        $propertyNames = array_diff(
            $allPropertyNames,
            array_intersect($excludedPropertyNames, $allPropertyNames)
        );
        $this->assertPropertiesSet($propertyNames);
    }

    /**
     * Asserts that all properties are set.
     *
     * @return void
     * @since 0.1.0
     */
    public function assertAllPropertiesSet()
    {
        $this->assertAllPropertiesSetExcept(array());
    }
}
