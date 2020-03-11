<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

class PostalType extends AbstractFixedLengthStringType
{
    public const TYPE = 'postal';
    public const LENGTH = 12;
}
