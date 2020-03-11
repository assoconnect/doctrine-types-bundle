<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\MoneyType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

class MoneyTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return MoneyType::class;
    }

    public function test_getName()
    {
        $this->assertSame(MoneyType::TYPE, $this->type->getName());
    }
}
