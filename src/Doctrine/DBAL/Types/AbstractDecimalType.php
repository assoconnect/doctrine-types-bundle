<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

abstract class AbstractDecimalType extends DecimalType
{
    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        if (!isset($fieldDeclaration['precision'])) {
            $fieldDeclaration['precision'] = static::DEFAULT_PRECISION;
        }
        if (!isset($fieldDeclaration['scale'])) {
            $fieldDeclaration['scale'] = static::DEFAULT_SCALE;
        }
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    /**
     * @inheritdoc
     */
    public function getName()
    {
        return static::TYPE;
    }

    /**
     * @inheritdoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
