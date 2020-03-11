<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

class PercentType extends AbstractDecimalType
{
    public const TYPE = 'percent';

    public const DEFAULT_PRECISION = 5;
    public const DEFAULT_SCALE = 2;
}
