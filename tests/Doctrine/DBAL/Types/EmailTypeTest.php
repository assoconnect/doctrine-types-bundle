<?php

namespace AssoConnect\DoctrineValidatorBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types\EmailType;
use AssoConnect\DoctrineValidatorBundle\Test\TypeTestCase;

class EmailTypeTest extends TypeTestCase
{

    protected function getClass(): string
    {
        return EmailType::class;
    }

    public function test_getName()
    {
        $this->assertSame(EmailType::TYPE, $this->type->getName());
    }
}
