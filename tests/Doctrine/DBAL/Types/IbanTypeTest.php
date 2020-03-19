<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\IbanType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class IbanTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return IbanType::class;
    }

    public function testGetName()
    {
        $this->assertSame(IbanType::TYPE, $this->type->getName());
    }
}
