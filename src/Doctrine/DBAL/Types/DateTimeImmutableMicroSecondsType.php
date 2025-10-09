<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Types\Type;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;

class DateTimeImmutableMicroSecondsType extends Type
{
    public const NAME = 'datetime_immutable_micro_seconds';

    public function getName(): string
    {
        return self::NAME;
    }

    public function getSQLDeclaration(array $column, AbstractPlatform $platform): string
    {
        return isset($column['version']) && $column['version'] === true ? 'TIMESTAMP' : 'DATETIME(3)';
    }

    public function convertToPHPValue($value, AbstractPlatform $platform): ?DateTimeInterface
    {
        if ($value === null || $value instanceof DateTimeImmutable) {
            return $value;
        }

        $date = DateTimeImmutable::createFromFormat('Y-m-d H:i:s.v', $value);

        if ($date === false) {
            try {
                $dateTime = new DateTimeImmutable($value);
            } catch (\Exception $e) {
                throw ConversionException::conversionFailedFormat(
                    $value,
                    $this->getName(),
                    'Y-m-d H:i:s.v',
                    $e // Previous exception bundled
                );
            }
            return $dateTime;
        }

        return $date;
    }

    public function convertToDatabaseValue($value, AbstractPlatform $platform): ?string
    {
        if (null === $value) {
            return $value;
        }

        if ($value instanceof DateTimeImmutable) {
            return $value->format('Y-m-d H:i:s.v');
        }

        throw ConversionException::conversionFailedInvalidType(
            $value,
            $this->getName(),
            ['null', DateTimeImmutable::class]
        );
    }
}
