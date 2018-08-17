<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

Class CountryType extends StringType
{

    const TYPE = 'country';

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['fixed'] = true;
        $fieldDeclaration['length'] = 2;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    public function getName()
    {
        return self::TYPE;
    }

}