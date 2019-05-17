<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\IbanType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

class IbanTypeTest extends TypeTestCase
{

    protected function getClass(): string
    {
        return IbanType::class;
    }

    public function test_getName()
    {
        $this->assertSame(IbanType::TYPE, $this->type->getName());
    }
}
