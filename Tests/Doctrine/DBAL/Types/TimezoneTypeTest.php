<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\TimezoneType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

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
