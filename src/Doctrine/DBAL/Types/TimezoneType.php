<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class TimezoneType extends AbstractFixedLengthStringType
{
    public const NAME = 'timezone';
    public const LENGTH = 30;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
