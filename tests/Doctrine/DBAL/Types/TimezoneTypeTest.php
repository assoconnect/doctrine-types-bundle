<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\TimezoneType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class TimezoneTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return TimezoneType::class;
    }

    public function test_getName()
    {
        $this->assertSame(TimezoneType::TYPE, $this->type->getName());
    }
}
