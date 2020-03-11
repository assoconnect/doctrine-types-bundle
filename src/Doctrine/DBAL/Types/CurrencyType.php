<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Money\Currency;

class CurrencyType extends AbstractFixedLengthStringType
{
    public const TYPE = 'currency';
    public const LENGTH = 3;

    /**
     * @inheritdoc
     */
    public function convertToDatabaseValue($value, AbstractPlatform $platform)
    {
        return ($value && $value instanceof Currency) ? $value->getCode() : null;
    }

    /**
     * @inheritdoc
     */
    public function convertToPHPValue($value, AbstractPlatform $platform)
    {
        return $value ? new Currency($value) : null;
    }
}
