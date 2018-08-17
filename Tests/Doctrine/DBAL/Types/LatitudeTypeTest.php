<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

Class LatitudeTypeTest extends TypeTestCase
{

    protected function getClass(): string
    {
        return LatitudeType::class;
    }

    public function test_getName()
    {
        $this->assertSame(LatitudeType::TYPE, $this->type->getName());
    }

}