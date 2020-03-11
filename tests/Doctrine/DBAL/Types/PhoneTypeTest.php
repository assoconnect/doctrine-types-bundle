<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

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
