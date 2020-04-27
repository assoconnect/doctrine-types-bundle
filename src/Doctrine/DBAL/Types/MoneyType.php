<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class MoneyType extends AbstractDecimalType
{
    public const TYPE = 'money';

    public const DEFAULT_PRECISION = 11;
    public const DEFAULT_SCALE = 2;
}
