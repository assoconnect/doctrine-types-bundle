<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

Class LocaleType extends StringType
{

    const TYPE = 'locale';

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = 5;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    public function getName()
    {
        return self::TYPE;
    }

}