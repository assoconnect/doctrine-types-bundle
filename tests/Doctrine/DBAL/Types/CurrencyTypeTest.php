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

    public function testGetName()
    {
        $this->assertSame(CurrencyType::TYPE, $this->type->getName());
    }

    public function testConvertToDatabaseValueValid()
    {
        $value = new Currency('EUR');
        $this->assertSame('EUR', $this->type->convertToDatabaseValue($value, $this->abstractPlatform));
    }

    public function testConvertToDatabaseValueNull()
    {
        $this->assertNull($this->type->convertToDatabaseValue(null, $this->abstractPlatform));
    }

    public function testConvertToDatabaseValueInvalid()
    {
        $this->assertNull($this->type->convertToDatabaseValue('EUR', $this->abstractPlatform));
    }

    public function testConvertToPHPValueValid()
    {
        $phpValue = $this->type->convertToPHPValue('EUR', $this->abstractPlatform);

        $this->assertInstanceOf(Currency::class, $phpValue);
        $this->assertSame('EUR', $phpValue->getCode());
    }

    public function testConvertToPHPValueNull()
    {
        $this->assertNull($this->type->convertToPHPValue(null, $this->abstractPlatform));
    }
}
