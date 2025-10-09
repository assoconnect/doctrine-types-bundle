<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class IbanType extends AbstractFixedLengthStringType
{
    public const NAME = 'iban';
    public const LENGTH = 31;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
