<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\LongitudeType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

class LongitudeTypeTest extends TypeTestCase
{

    protected function getClass(): string
    {
        return LongitudeType::class;
    }

    public function test_getName()
    {
        $this->assertSame(LongitudeType::TYPE, $this->type->getName());
    }
}
