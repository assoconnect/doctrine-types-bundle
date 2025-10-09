<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class TypeTestCase extends TestCase
{
    /**
     * @var MockObject|AbstractPlatform
     */
    protected $abstractPlatform;

    protected Type $type;

    /**
     * @return class-string<Type>
     */
    abstract protected function getClass(): string;

    protected function setUp(): void
    {
        $this->abstractPlatform = $this->getMockForAbstractClass(
            AbstractPlatform::class,
            array(),
            '',
            true,
            true,
            true,
            array('getVarcharTypeDeclarationSQL', 'getDecimalTypeDeclarationSQL')
        );

        $class = $this->getClass();
        $name = $class::NAME;

        if (!Type::hasType($name)) {
            Type::addType($name, $class);
        }

        $this->type = Type::getType($name);
    }

    /**
     * This test is to be done by default because all custom types normally need a Doctrine comment
     */
    public function testRequiresSQLCommentHint(): void
    {
        self::assertTrue($this->type->requiresSQLCommentHint($this->abstractPlatform));
    }
}
