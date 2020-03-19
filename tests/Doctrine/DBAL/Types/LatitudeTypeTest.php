<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\LatitudeType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class LatitudeTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return LatitudeType::class;
    }

    public function testGetName()
    {
        $this->assertSame(LatitudeType::TYPE, $this->type->getName());
    }
}
