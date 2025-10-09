<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PhoneType extends AbstractFixedLengthStringType
{
    public const NAME = 'phone';
    public const LENGTH = 15;

    protected function getLength(): int
    {
        return self::LENGTH;
    }

    public function getName(): string
    {
        return self::NAME;
    }
}
