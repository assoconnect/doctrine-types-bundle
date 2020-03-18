<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\PhoneLandlineType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class PhoneLandlineTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return PhoneLandlineType::class;
    }

    public function test_getName()
    {
        $this->assertSame(PhoneLandlineType::TYPE, $this->type->getName());
    }
}
