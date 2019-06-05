<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class PhoneType extends StringType
{

    const TYPE = 'phone';
    const LENGTH = 15;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = self::LENGTH;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    public function getName()
    {
        return static::TYPE;
    }
}
