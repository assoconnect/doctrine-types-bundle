<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\SpanishNifType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class SpanishNifTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return SpanishNifType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(SpanishNifType::NAME, $this->type->getName());
    }

    public function testGetSQLDeclaration(): void
    {
        $this->abstractPlatform
            ->method('getVarcharTypeDeclarationSQL')
            ->with(['length' => SpanishNifType::LENGTH])
            ->willReturn('VARCHAR');

        self::assertSame('VARCHAR', $this->type->getSQLDeclaration([], $this->abstractPlatform));
    }
}
