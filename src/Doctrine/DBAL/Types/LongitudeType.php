<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class LongitudeType extends AbstractDecimalType
{
    public const NAME = 'longitude';

    public const DEFAULT_PRECISION = 9;
    public const DEFAULT_SCALE = 6;

    protected function getDefaultPrecision(): int
    {
        return self::DEFAULT_PRECISION;
    }

    protected function getDefaultScale(): int
    {
        return self::DEFAULT_SCALE;
    }

    public function getName(): string
    {
        return static::NAME;
    }
}
