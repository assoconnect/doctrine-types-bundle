<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\PhoneType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class PhoneTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return PhoneType::class;
    }

    public function test_getName()
    {
        $this->assertSame(PhoneType::TYPE, $this->type->getName());
    }
}
