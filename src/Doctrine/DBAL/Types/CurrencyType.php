<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Money\Currency;

class CurrencyType extends AbstractFixedLengthStringType
{
    public const NAME = 'currency';
    public const LENGTH = 3;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }

    /**
     * @inheritdoc
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        return ($value instanceof Currency) ? $value->getCode() : null;
    }

    /**
     * @inheritdoc
     */
    public function convertToPHPValue($value, AbstractPlatform $platform): ?Currency
    {
        return is_string($value) && '' !== $value ? new Currency($value) : null;
    }
}
