<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class FrenchSiretType extends AbstractFixedLengthStringType
{
    public const NAME = 'frenchSiret';
    public const LENGTH = 14;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
