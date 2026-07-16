<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\CountryType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class CountryTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return CountryType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(CountryType::NAME, (new CountryType())->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $platform
            ->expects(self::once())
            ->method('getStringTypeDeclarationSQL')
            ->with(['fixed' => true, 'length' => CountryType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $platform));
    }
}
