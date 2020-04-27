<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class LongitudeType extends AbstractDecimalType
{
    public const TYPE = 'longitude';

    public const DEFAULT_PRECISION = 9;
    public const DEFAULT_SCALE = 6;
}
