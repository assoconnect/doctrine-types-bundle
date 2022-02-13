<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\CountryType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class CountryTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return CountryType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(CountryType::NAME, $this->type->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $this->abstractPlatform
            ->method('getVarcharTypeDeclarationSQL')
            ->with(['fixed' => true, 'length' => CountryType::LENGTH])
            ->willReturn("VARCHAR");

        self::assertSame("VARCHAR", $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
