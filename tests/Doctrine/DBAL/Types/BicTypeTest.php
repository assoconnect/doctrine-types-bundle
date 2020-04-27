<?php

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

    public function testGetName()
    {
        $this->assertSame(BicType::TYPE, $this->type->getName());
    }

    public function testGetSQLDeclaration()
    {
        $this->abstractPlatform->method("getVarcharTypeDeclarationSQL")->willReturn("VARCHAR");
        $this->assertSame('VARCHAR', $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
