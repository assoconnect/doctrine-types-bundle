<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class IpType extends StringType
{

    const TYPE = 'ip';
    const LENGTH = 39;

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
