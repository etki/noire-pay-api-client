<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transmission;

/**
 * This entity represents connection credentials.
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity
 * @author  Etki <etki@etki.name>
 */
class Credentials
{
    /**
     * API user login.
     *
     * @type string
     * @since 0.1.0
     */
    protected $login;
    /**
     * API user password.
     *
     * @type string
     * @since 0.1.0
     */
    protected $password;

    /**
     * Initializer.
     *
     * @param string $login    API login.
     * @param string $password API password.
     *
     * @return self
     * @since 0.1.0
     */
    public function __construct($login, $password)
    {
        $this->login = $login;
        $this->password = $password;
    }

    /**
     * Returns login.
     *
     * @return string
     * @since 0.1.0
     */
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Returns password.
     *
     * @return string
     * @since 0.1.0
     */
    public function getPassword()
    {
        return $this->password;
    }
}
