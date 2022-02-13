<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class FrenchRnaType extends AbstractFixedLengthStringType
{
    public const NAME = 'frenchRna';
    public const LENGTH = 15;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
