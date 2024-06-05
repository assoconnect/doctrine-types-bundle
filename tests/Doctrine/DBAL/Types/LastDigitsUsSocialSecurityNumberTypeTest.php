<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\LastDigitsUsSocialSecurityNumberType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class LastDigitsUsSocialSecurityNumberTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return LastDigitsUsSocialSecurityNumberType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(LastDigitsUsSocialSecurityNumberType::NAME, $this->type->getName());
    }
}