<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class FrenchSirenType extends AbstractFixedLengthStringType
{
    public const NAME = 'frenchSiren';
    public const LENGTH = 9;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
