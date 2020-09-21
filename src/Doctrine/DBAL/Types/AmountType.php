<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

/**
 * This type is used to store the amount information of a Money object. It is used for automatic validation.
 *
 * Class AmountType
 * @package AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types
 */
class AmountType extends AbstractFixedLengthStringType
{
    public const TYPE = 'amount';
    public const LENGTH = 255;
}
