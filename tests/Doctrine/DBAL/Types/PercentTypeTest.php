<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\PercentType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

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
