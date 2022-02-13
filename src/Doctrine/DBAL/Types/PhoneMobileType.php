<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PhoneMobileType extends PhoneType
{
    public const NAME = 'phonemobile';

    public function getName(): string
    {
        return self::NAME;
    }
}
