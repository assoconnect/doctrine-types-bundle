<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class IbanType extends AbstractFixedLengthStringType
{
    public const TYPE = 'iban';
    public const LENGTH = 31;
}
