<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

class LocaleType extends AbstractFixedLengthStringType
{
    public const TYPE = 'locale';
    public const LENGTH = 5;
}
