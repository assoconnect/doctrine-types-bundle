<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class FrenchSirenType extends AbstractFixedLengthStringType
{
    public const TYPE = 'frenchSiren';
    public const LENGTH = 9;
}
