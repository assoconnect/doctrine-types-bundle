<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class BicType extends AbstractFixedLengthStringType
{
    public const NAME = 'bic';
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
