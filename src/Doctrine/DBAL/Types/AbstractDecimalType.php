<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\DecimalType;

abstract class AbstractDecimalType extends DecimalType
{
    abstract protected function getDefaultPrecision(): int;
    abstract protected function getDefaultScale(): int;

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        if (!isset($fieldDeclaration['precision'])) {
            $fieldDeclaration['precision'] = $this->getDefaultPrecision();
        }
        if (!isset($fieldDeclaration['scale'])) {
            $fieldDeclaration['scale'] = $this->getDefaultScale();
        }
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }

    /**
     * @inheritdoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
