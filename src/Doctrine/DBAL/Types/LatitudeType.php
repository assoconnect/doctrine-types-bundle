<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class LatitudeType extends AbstractDecimalType
{
    public const TYPE = 'latitude';

    public const DEFAULT_PRECISION = 9;
    public const DEFAULT_SCALE = 6;
}
