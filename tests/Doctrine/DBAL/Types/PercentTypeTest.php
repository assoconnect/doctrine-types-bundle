<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PercentType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

class PercentTypeTest extends TypeTestCase
{

    protected function getClass(): string
    {
        return PercentType::class;
    }

    public function test_getName()
    {
        $this->assertSame(PercentType::TYPE, $this->type->getName());
    }
}
