<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use Doctrine\DBAL\Platforms\AbstractPlatform;

class CountryType extends AbstractFixedLengthStringType
{
    public const NAME = 'country';
    public const LENGTH = 2;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }

    /**
     * @inheritdoc
     */
    public function getSQLDeclaration(array $fieldDeclaration, AbstractPlatform $platform): string
    {
        $fieldDeclaration['fixed'] = true;
        return parent::getSQLDeclaration($fieldDeclaration, $platform);
    }
}
