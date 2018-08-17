<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\PhoneLandlineType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

Class PhoneLandlineTypeTest extends TypeTestCase
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