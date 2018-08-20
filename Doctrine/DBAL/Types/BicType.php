<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

Class BicType extends StringType
{

    const TYPE = 'bic';
    const LENGTH = 11;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        return 'VARCHAR(' . self::LENGTH . ')';
    }

    public function getName()
    {
        return self::TYPE;
    }

}