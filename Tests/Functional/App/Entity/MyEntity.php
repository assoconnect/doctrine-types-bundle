<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity;

use AssoConnect\DoctrineValidatorBundle\Validator\Constraints as AssoConnectAssert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @AssoConnectAssert\Entity()
 * @ORM\Entity()
 */
Class MyEntity
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    public $id;

    /**
     * @ORM\Column(type="bic")
     */
    public $bic;

    /**
     * @ORM\Column(type="boolean")
     */
    public $boolean;

    /**
     * @ORM\Column(type="country")
     */
    public $country;

    /**
     * @ORM\Column(type="date")
     */
    public $date;

    /**
     * @ORM\Column(type="datetime")
     */
    public $datetime;

    /**
     * @ORM\Column(type="decimal", precision=5, scale=3)
     */
    public $decimal;

    /**
     * @ORM\Column(type="email")
     */
    public $email;

    /**
     * @ORM\Column(type="float")
     */
    public $float;

    /**
     * @ORM\Column(type="iban")
     */
    public $iban;

    /**
     * @ORM\Column(type="integer")
     */
    public $integer;

    /**
     * @ORM\Column(type="json")
     */
    public $json;

    /**
     * @ORM\Column(type="latitude")
     */
    public $latitude;

    /**
     * @ORM\Column(type="locale")
     */
    public $locale;

    /**
     * @ORM\Column(type="longitude")
     */
    public $longitude;

    /**
     * @ORM\Column(type="money")
     */
    public $money;

    /**
     * @ORM\Column(type="string", nullable=false)
     */
    public $nullable;

    /**
     * @ORM\Column(type="percent")
     */
    public $percent;

    /**
     * @ORM\Column(type="phone")
     */
    public $phone;

    /**
     * @ORM\Column(type="phonelandline")
     */
    public $phonelandline;

    /**
     * @ORM\Column(type="phonemobile")
     */
    public $phonemobile;

    /**
     * @ORM\Column(type="string", length=10)
     */
    public $string;

    /**
     * @ORM\Column(type="text", length=10)
     */
    public $text;

    /**
     * @ORM\Column(type="timezone")
     */
    public $timezone;

    /**
     * @ORM\Column(type="uuid")
     */
    public $uuid;

    /**
     * @ORM\Column(type="uuid_binary_ordered_time")
     */
    public $uuid_binary_ordered_time;

    /** ASSOCIATIONS */

    /**
     * @ORM\ManyToOne(targetEntity="MyEntityParent")
     */
    public $parentNullable;

    /**
     * @ORM\ManyToOne(targetEntity="MyEntityParent")
     * @ORM\JoinColumn(nullable=false)
     */
    public $parentNotNullable;

    /**
     * @ORM\OneToMany(targetEntity="MyEntityParent", mappedBy="mainChild")
     */
    public $mainParent;

    /** EMBEDDABLES */

    /**
     * @ORM\Embedded(class="MyEmbeddable")
     */
    public $embeddable;


}