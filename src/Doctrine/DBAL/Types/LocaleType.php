<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class LocaleType extends AbstractFixedLengthStringType
{
    public const TYPE = 'locale';
    public const LENGTH = 5;
}
