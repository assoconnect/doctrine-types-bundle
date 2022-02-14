<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\CurrencyType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Money\Currency;

class CurrencyTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return CurrencyType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(CurrencyType::NAME, $this->type->getName());
    }

    public function testConvertToDatabaseValueValid(): void
    {
        $value = new Currency('EUR');
        self::assertSame('EUR', $this->type->convertToDatabaseValue($value, $this->abstractPlatform));
    }

    public function testConvertToDatabaseValueNull(): void
    {
        self::assertNull($this->type->convertToDatabaseValue(null, $this->abstractPlatform));
    }

    public function testConvertToDatabaseValueInvalid(): void
    {
        self::assertNull($this->type->convertToDatabaseValue('EUR', $this->abstractPlatform));
    }

    public function testConvertToPHPValueValid(): void
    {
        $phpValue = $this->type->convertToPHPValue('EUR', $this->abstractPlatform);

        self::assertInstanceOf(Currency::class, $phpValue);
        self::assertSame('EUR', $phpValue->getCode());
    }

    public function testConvertToPHPValueNull(): void
    {
        self::assertNull($this->type->convertToPHPValue(null, $this->abstractPlatform));
    }
}
