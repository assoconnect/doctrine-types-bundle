<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\BelgianEnterpriseNumberType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class BelgianEnterpriseNumberTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return BelgianEnterpriseNumberType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(BelgianEnterpriseNumberType::NAME, (new BelgianEnterpriseNumberType())->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $platform
            ->expects(self::once())
            ->method('getStringTypeDeclarationSQL')
            ->with(['length' => BelgianEnterpriseNumberType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $platform));
    }
}
