<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\StringType;

class TimezoneType extends StringType
{

    const TYPE = 'timezone';

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform)
    {
        $fieldDeclaration['length'] = 30;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    public function getName()
    {
        return self::TYPE;
    }

    /**
     * @inheritdoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform)
    {
        return true;
    }
}
