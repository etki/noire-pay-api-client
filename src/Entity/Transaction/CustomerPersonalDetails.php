<?php

namespace Etki\Api\Clients\NoirePay\Entity\Transaction;

use Etki\Api\Clients\NoirePay\Entity\AbstractEntity;
use DateTime;

/**
 * Customer personal details chest.
 *
 * @method $this setSalutation(string $salutation)
 * @method string getSalutation()
 * @method $this setTitle(string $title)
 * @method string getTitle()
 * @method $this setGivenName(string $givenName)
 * @method string getGivenName()
 * @method $this setFamilyName(string $familyName)
 * @method string getFamilyName()
 * @method $this setSex(string $sex) Either 'M' or 'F'.
 * @method string getSex()
 * setBirthDate(string $birthDate) is implemented directly
 * @method string getBirthDate()
 * @method $this setCompany(string $company)
 * @method string getCompany()
 *
 * @version 0.1.0
 * @since   0.1.0
 * @package Etki\Api\Clients\NoirePay\Entity\Transaction
 * @author  Etki <etki@etki.name>
 */
class CustomerPersonalDetails extends AbstractEntity
{
    /**
     * Salutation. Use one of SALUTATION_* constants.
     *
     * @type string
     * @since 0.1.0
     */
    protected $salutation;
    /**
     * Title.
     *
     * @type string
     * @since 0.1.0
     */
    protected $title;
    /**
     * First name.
     *
     * @type string
     * @since 0.1.0
     */
    protected $givenName;
    /**
     * Last name.
     *
     * @type string
     * @since 0.1.0
     */
    protected $familyName;
    /**
     * Customer sex. Use self::SEX_MALE or self::SEX_FEMALE constant.
     *
     * @type string
     * @since 0.1.0
     */
    protected $sex;
    /**
     * Customer birth date.
     *
     * @type string
     * @since 0.1.0
     */
    protected $birthDate;
    /**
     * Customer company.
     *
     * @type string
     * @since 0.1.0
     */
    protected $company;
    /**
     * Diploma engineer title.
     *
     * @type string
     * @since 0.1.0
     */
    const TITLE_DIPLOMA_ENGINEER = 'DPLING';
    /**
     * Doctor title.
     *
     * @type string
     * @since 0.1.0
     */
    const TITLE_DOCTOR = 'DR';
    /**
     * Ph.D. title.
     *
     * @type string
     * @since 0.1.0
     */
    const TITLE_PHD = 'PHD';
    /**
     * Professor title.
     *
     * @type string
     * @since 0.1.0
     */
    const TITLE_PROFESSOR = 'PROF';
    /**
     * Mr. salutation.
     *
     * @type string
     * @since 0.1.0
     */
    const SALUTATION_MISTER = 'MR';
    /**
     * Mrs. salutation.
     *
     * @type string
     * @since 0.1.0
     */
    const SALUTATION_MRS = 'MRS';
    /**
     * Miss salutation
     *
     * @type string
     * @since 0.1.0
     */
    const SALUTATION_MISS = 'MS';
    /**
     * Constant for specifying customer as male.
     *
     * @type string
     * @since 0.1.0
     */
    const SEX_MALE = 'M';
    /**
     * Constant for specifying customer as female.
     *
     * @type string
     * @since 0.1.0
     */
    const SEX_FEMALE = 'F';
    /**
     * Date format.
     *
     * @type string
     * @since 0.1.0
     */
    const BIRTH_DATE_FORMAT = 'Y-m-d';

    /**
     * Sets customer birth date.
     *
     * @param string|DateTime $birthDate Customer birth date.
     *
     * @return void
     * @since 0.1.0
     */
    public function setBirthDate($birthDate)
    {
        if ($birthDate instanceof DateTime) {
            $dateObject = $birthDate;
        } else {
            $dateObject = new DateTime($birthDate);
        }
        $this->birthDate = $dateObject->format(static::BIRTH_DATE_FORMAT);
    }
}
