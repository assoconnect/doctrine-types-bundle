<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

Class EmailType extends StringType
{

    const TYPE = 'email';

    public function getName()
    {
        return self::TYPE;
    }

}