<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\DutchKvkNumberType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class DutchKvkNumberTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return DutchKvkNumberType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(DutchKvkNumberType::NAME, (new DutchKvkNumberType())->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $platform
            ->expects(self::once())
            ->method('getStringTypeDeclarationSQL')
            ->with(['length' => DutchKvkNumberType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $platform));
    }
}
