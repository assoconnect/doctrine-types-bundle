<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\Type;

/**
 * This type is used to store the amount information of a Money object. It is used for automatic validation.
 *
 * Class AmountAsBigintType
 * @package AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types
 */
class AmountAsBigintType extends Type
{
    public const NAME = 'amountAsBigint';

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return $platform->getBigIntTypeDeclarationSQL($column);
    }

    public function getName(): string
    {
        return self::NAME;
    }

    /**
     * @inheritDoc
     */
    public function requiresSQLCommentHint(AbstractPlatform $platform): bool
    {
        return true;
    }
}
