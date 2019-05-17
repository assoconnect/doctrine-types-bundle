<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity;

use AssoConnect\DoctrineValidatorBundle\Validator\Constraints as AssoConnectAssert;
use Doctrine\ORM\Mapping as ORM;

/**
 * @AssoConnectAssert\Entity()
 * @ORM\Entity()
 */
class MyEntityParent
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="NONE")
     */
    public $id;

    /**
     * @ORM\ManyToOne(targetEntity="MyEntity")
     */
    public $mainChild;
}
