<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class BicType extends AbstractFixedLengthStringType
{
    public const TYPE = 'bic';
    public const LENGTH = 11;
}
