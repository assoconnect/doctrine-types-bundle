<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class CountryType extends AbstractFixedLengthStringType
{
    public const TYPE = 'country';
    public const LENGTH = 2;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['fixed'] = true;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }
}
