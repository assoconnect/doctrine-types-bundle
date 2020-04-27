<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PhoneType extends AbstractFixedLengthStringType
{
    public const TYPE = 'phone';
    public const LENGTH = 15;
}
