<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class UsSocialSecurityNumberType extends AbstractFixedLengthStringType
{
    public const NAME = 'usSocialSecurityNumber';
    public const LENGTH = 11;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
