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

    public function testGetName()
    {
        $this->assertSame(PhoneMobileType::TYPE, $this->type->getName());
    }
}
