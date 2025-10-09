<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\BicType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\MySqlPlatform;

class BicTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return BicType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(BicType::NAME, $this->type->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $this->abstractPlatform->method("getVarcharTypeDeclarationSQL")->willReturn("VARCHAR");
        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
