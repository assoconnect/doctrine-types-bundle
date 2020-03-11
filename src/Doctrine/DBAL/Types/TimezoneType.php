<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

class TimezoneType extends AbstractFixedLengthStringType
{
    public const TYPE = 'timezone';
    public const LENGTH = 30;
}
