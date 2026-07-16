<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\SpanishNifType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;
use Doctrine\DBAL\Platforms\AbstractPlatform;

class SpanishNifTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return SpanishNifType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(SpanishNifType::NAME, (new SpanishNifType())->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $platform = $this->createMock(AbstractPlatform::class);
        $platform
            ->expects(self::once())
            ->method('getStringTypeDeclarationSQL')
            ->with(['length' => SpanishNifType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $platform));
    }
}
