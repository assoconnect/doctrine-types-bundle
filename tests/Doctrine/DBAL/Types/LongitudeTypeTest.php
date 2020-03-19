<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\LongitudeType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class LongitudeTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return LongitudeType::class;
    }

    public function testGetName()
    {
        $this->assertSame(LongitudeType::TYPE, $this->type->getName());
    }
}
