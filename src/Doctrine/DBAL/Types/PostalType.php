<?php

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

class PostalType extends AbstractFixedLengthStringType
{
    public const TYPE = 'postal';
    public const LENGTH = 12;
}
