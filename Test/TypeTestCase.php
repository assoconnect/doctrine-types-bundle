<?php

namespace AssoConnect\DoctrineValidatorBundle\Test;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\TestCase;

Abstract class TypeTestCase extends TestCase
{

    /**
     * @var AbstractPlatform
     */
    protected $abstractPlatform;

    /**
     * @var Type
     */
    protected $type;

    protected abstract function getClass() :string;

    public function setUp()
    {
        $this->abstractPlatform = $this->getMockForAbstractClass('Doctrine\DBAL\Platforms\AbstractPlatform');

        $class = $this->getClass();
        $name = $class::TYPE;

        if (!Type::hasType($name)) {
            Type::addType($name, $class);
        }

        $this->type = Type::getType($name);
    }

}