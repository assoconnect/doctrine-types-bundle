<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class DutchKvkNumberType extends AbstractFixedLengthStringType
{
    public const NAME = 'dutchKvkNumber';
    public const LENGTH = 8;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
