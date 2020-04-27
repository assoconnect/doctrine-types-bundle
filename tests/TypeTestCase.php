<?php

namespace AssoConnect\DoctrineTypesBundle\Tests;

use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

abstract class TypeTestCase extends TestCase
{

    /**
     * @var MockObject
     */
    protected $abstractPlatform;

    /**
     * @var Type
     */
    protected $type;

    abstract protected function getClass(): string;

    protected function setUp(): void
    {
        $this->abstractPlatform = $this->getMockForAbstractClass(
            'Doctrine\DBAL\Platforms\AbstractPlatform',
            array(),
            '',
            true,
            true,
            true,
            array('getVarcharTypeDeclarationSQL', 'getDecimalTypeDeclarationSQL')
        );

        $class = $this->getClass();
        $name = $class::TYPE;

        if (!Type::hasType($name)) {
            Type::addType($name, $class);
        }

        $this->type = Type::getType($name);
    }

    /**
     * This test is to be done by default because all custom types normally need a Doctrine comment
     */
    public function testRequiresSQLCommentHint()
    {
        $this->assertTrue($this->type->requiresSQLCommentHint($this->abstractPlatform));
    }
}
