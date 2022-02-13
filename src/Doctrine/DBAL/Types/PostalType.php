<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PostalType extends AbstractFixedLengthStringType
{
    public const NAME = 'postal';
    public const LENGTH = 12;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
