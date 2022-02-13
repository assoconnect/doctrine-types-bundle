<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PhoneLandlineType extends PhoneType
{
    public const NAME = 'phonelandline';

    public function getName(): string
    {
        return self::NAME;
    }
}
