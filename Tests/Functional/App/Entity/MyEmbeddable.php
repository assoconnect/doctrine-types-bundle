<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Functional\App\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Embeddable()
 */
Class MyEmbeddable
{

    /**
     * @ORM\Column(type="boolean")
     */
    public $bool;

    public function __construct($bool)
    {
        $this->bool = $bool;
    }

}