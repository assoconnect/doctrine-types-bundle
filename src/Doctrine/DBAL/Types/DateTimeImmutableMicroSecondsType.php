<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types;

use DateTimeImmutable;
use DateTimeInterface;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Exception\InvalidFormat;
use Doctrine\DBAL\Types\Exception\InvalidType;
use Doctrine\DBAL\Types\Type;

class DateTimeImmutableMicroSecondsType extends Type
{
    public const NAME = 'datetime_immutable_micro_seconds';

    private const FORMAT = 'Y-m-d H:i:s.v';

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

        $date = DateTimeImmutable::createFromFormat(self::FORMAT, $value);

        if ($date === false) {
            try {
                $dateTime = new DateTimeImmutable($value);
            } catch (\Exception $e) {
                throw $this->createInvalidFormatException($value, $e);
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
            return $value->format(self::FORMAT);
        }

        throw $this->createInvalidTypeException($value);
    }

    /**
     * DBAL 4 replaced the ConversionException static factories with dedicated exception classes.
     * The runtime conditionals below can be inlined once DBAL 3 support is dropped.
     * Excluded from coverage: only one branch can run for a given installed DBAL major.
     *
     * @codeCoverageIgnore
     */
    private function createInvalidFormatException(mixed $value, \Throwable $previous): ConversionException
    {
        if (class_exists(InvalidFormat::class)) {
            return InvalidFormat::new($value, self::NAME, self::FORMAT, $previous);
        }

        return ConversionException::conversionFailedFormat($value, self::NAME, self::FORMAT, $previous);
    }

    /**
     * @codeCoverageIgnore
     */
    private function createInvalidTypeException(mixed $value): ConversionException
    {
        if (class_exists(InvalidType::class)) {
            return InvalidType::new($value, self::NAME, ['null', DateTimeImmutable::class]);
        }

        return ConversionException::conversionFailedInvalidType($value, self::NAME, [
            'null',
            DateTimeImmutable::class,
        ]);
    }
}
