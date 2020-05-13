<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class FrenchRnaType extends AbstractFixedLengthStringType
{
    public const TYPE = 'frenchRna';
    public const LENGTH = 15;
}
