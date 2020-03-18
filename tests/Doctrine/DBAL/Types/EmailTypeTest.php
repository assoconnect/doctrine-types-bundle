<?php

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\EmailType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

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
