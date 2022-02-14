<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

/**
 * This type is used to store the value information of a AbsolutePercentValue/Value object.
 */
class AbsolutePercentValueType extends AbstractFixedLengthStringType
{
    public const NAME = 'absolute_percent_value';
    public const LENGTH = 255;

    public function getName(): string
    {
        return self::NAME;
    }

    protected function getLength(): int
    {
        return self::LENGTH;
    }
}
