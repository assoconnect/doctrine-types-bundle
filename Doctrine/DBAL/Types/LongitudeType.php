<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

class LongitudeType extends DecimalType
{

    const TYPE = 'longitude';

    const DEFAULT_PRECISION = 9;
    const DEFAULT_SCALE = 6;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if (!isset($fieldDeclaration['precision'])) {
            $fieldDeclaration['precision'] = self::DEFAULT_PRECISION;
        }
        if (!isset($fieldDeclaration['scale'])) {
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
