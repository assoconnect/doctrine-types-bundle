<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\PhoneMobileType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class PhoneMobileTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return PhoneMobileType::class;
    }

    public function test_getName()
    {
        $this->assertSame(PhoneMobileType::TYPE, $this->type->getName());
    }
}
