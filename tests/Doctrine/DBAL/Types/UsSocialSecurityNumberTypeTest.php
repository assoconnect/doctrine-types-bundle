<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\FrenchSiretType;
use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\UsSocialSecurityNumberType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class UsSocialSecurityNumberTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return UsSocialSecurityNumberType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(UsSocialSecurityNumberType::NAME, $this->type->getName());
    }
}
