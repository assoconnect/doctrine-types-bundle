<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\EmailType;
use AssoConnect\DoctrineTypesBundle\Tests\TypeTestCase;

class EmailTypeTest extends TypeTestCase
{
    protected function getClass(): string
    {
        return EmailType::class;
    }

    public function testGetName(): void
    {
        self::assertSame(EmailType::NAME, $this->type->getName());
    }
}
