<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\FrenchSiretType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class FrenchSiretTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return FrenchSiretType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(FrenchSiretType::NAME, $this->type->getName());
    }
}
