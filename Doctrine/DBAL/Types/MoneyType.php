<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

Class MoneyType extends DecimalType
{

    const TYPE = 'money';

    const DEFAULT_PRECISION = 11;
    const DEFAULT_SCALE = 2;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if(!isset($fieldDeclaration['precision'])){
            $fieldDeclaration['precision'] = self::DEFAULT_PRECISION;
        }
        if(!isset($fieldDeclaration['scale'])){
            $fieldDeclaration['scale'] = self::DEFAULT_SCALE;
        }
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return self::TYPE;
    }

}