<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\BicType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class BicTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return BicType::class;
    }

    public function test_getName()
    {
        $this->assertSame(BicType::TYPE, $this->type->getName());
    }
}
