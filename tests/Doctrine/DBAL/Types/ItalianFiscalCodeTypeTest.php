<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\ItalianFiscalCodeType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class ItalianFiscalCodeTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return ItalianFiscalCodeType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(ItalianFiscalCodeType::NAME, (new ItalianFiscalCodeType())->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $platform
            ->expects(self::once())
            ->method('getStringTypeDeclarationSQL')
            ->with(['length' => ItalianFiscalCodeType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $platform));
    }
}
