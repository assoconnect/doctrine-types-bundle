<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\BelgianEnterpriseNumberType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class BelgianEnterpriseNumberTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return BelgianEnterpriseNumberType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(BelgianEnterpriseNumberType::NAME, $this->type->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $this->abstractPlatform
            ->method('getVarcharTypeDeclarationSQL')
            ->with(['length' => BelgianEnterpriseNumberType::LENGTH])
            ->willReturn("VARCHAR");

        self::assertSame("VARCHAR", $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
