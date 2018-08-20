<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\BicType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

Class BicTypeTest extends TypeTestCase
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