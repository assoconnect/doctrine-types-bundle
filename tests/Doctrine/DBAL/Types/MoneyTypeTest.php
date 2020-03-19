<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\MoneyType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class MoneyTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return MoneyType::class;
    }

    public function testGetName()
    {
        $this->assertSame(MoneyType::TYPE, $this->type->getName());
    }
}
