<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class LastDigitsUsSocialSecurityNumberType extends AbstractFixedLengthStringType
{
    public const NAME = 'lastDigitsUsSocialSecurityNumber';
    public const LENGTH = 4;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
