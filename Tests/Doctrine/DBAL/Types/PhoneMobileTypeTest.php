<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneMobileType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

Class PhoneMobileTypeTest extends TypeTestCase
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