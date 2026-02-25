<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class BelgianEnterpriseNumberType extends AbstractFixedLengthStringType
{
    public const NAME = 'belgianEnterpriseNumber';
    public const LENGTH = 10;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
