<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class LatitudeTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return LatitudeType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(LatitudeType::NAME, $this->type->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $this->abstractPlatform->method("getDecimalTypeDeclarationSQL")->willReturn("DECIMAL");

        self::assertSame("DECIMAL", $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
