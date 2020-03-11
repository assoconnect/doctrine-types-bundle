<?php

namespace AssoConnect\DoctrineValidatorBundle\Doctrine\DBAL\Types;

class IpType extends AbstractFixedLengthStringType
{
    public const TYPE = 'ip';
    public const LENGTH = 39;
}
