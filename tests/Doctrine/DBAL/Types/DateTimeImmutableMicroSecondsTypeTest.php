<?php

declare(strict_types=1);

namespace AssoConnect\DoctrineTypesBundle\Tests\Doctrine\DBAL\Types;

use AssoConnect\DoctrineTypesBundle\Doctrine\DBAL\Types\DateTimeImmutableMicroSecondsType;
use Doctrine\DBAL\Platforms\AbstractPlatform;
use Doctrine\DBAL\Types\ConversionException;
use Doctrine\DBAL\Types\Type;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class DateTimeImmutableMicroSecondsTypeTest extends TestCase
{
    /** @var AbstractPlatform|MockObject */
    protected AbstractPlatform $platform;

    protected Type $type;

    protected function setUp(): void
    {
        $this->type = new DateTimeImmutableMicroSecondsType();
        $this->platform = $this->getMockForAbstractClass(AbstractPlatform::class);
    }

    /**
     * @param mixed $value
     *
     * @dataProvider invalidPHPValuesProvider
     */
    public function testInvalidTypeConversionToDatabaseValue($value): void
    {
        $this->expectException(ConversionException::class);

        $this->type->convertToDatabaseValue($value, $this->platform);
    }

    /**
     * @return iterable<mixed>
     */
    public static function invalidPHPValuesProvider(): iterable
    {
        yield [0];
        yield [''];
        yield ['foo'];
        yield ['10:11:12'];
        yield ['2015-01-31'];
        yield ['2015-01-31 10:11:12'];
        yield [new \stdClass()];
        yield [27];
        yield [-1];
        yield [1.2];
        yield [[]];
        yield [['an array']];
    }

    public function testNullConversion(): void
    {
        self::assertNull($this->type->convertToPHPValue(null, $this->platform));
    }

    /**
     * @dataProvider provideDateTimeValues
     */
    public function testDateConvertsToDatabaseValue(string $datetime, string $expectedDatetimeResult): void
    {
        $date = new \DateTimeImmutable($datetime);

        self::assertSame($expectedDatetimeResult, $this->type->convertToDatabaseValue($date, $this->platform));
    }

    /**
     * @dataProvider provideDateTimeValues
     */
    public function testConvertDateToPHPValue(string $datetime): void
    {
        $date = new \DateTimeImmutable($datetime);

        self::assertSame($date, $this->type->convertToPHPValue($date, $this->platform));
    }


    /**
     * @return iterable<string, array{string, string}>
    */
    public static function provideDateTimeValues(): iterable
    {
        yield 'default datetime format' => ['1985-09-01 10:11:12.123', '1985-09-01 10:11:12.123'];
        yield 'date time with 6 digit microseconds precision' => [
            '1985-09-01 10:11:12.123456',
            '1985-09-01 10:11:12.123',
        ];
        yield 'date time with 6 digit microseconds precision 2' => [
            '1985-09-01 10:11:12.123756',
            '1985-09-01 10:11:12.123',
        ];
        yield 'only date' => ['1985-09-01', '1985-09-01 00:00:00.000'];
        yield 'date time without microsecond' => ['1985-09-01 10:11:12', '1985-09-01 10:11:12.000'];
    }

    public function testDateResetsNonDatePartsToZeroUnixTimeValues(): void
    {
        $date = $this->type->convertToPHPValue('1985-09-01', $this->platform);

        self::assertEquals('00:00:00.000', $date->format('H:i:s.v'));
    }

    public function testDateResetsSummerTimeAffection(): void
    {
        date_default_timezone_set('Europe/Berlin');

        $date = $this->type->convertToPHPValue('2009-08-01', $this->platform);
        self::assertEquals('2009-08-01 00:00:00.000', $date->format('Y-m-d H:i:s.v'));

        $date = $this->type->convertToPHPValue('2009-11-01', $this->platform);
        self::assertEquals('2009-11-01 00:00:00.000', $date->format('Y-m-d H:i:s.v'));
    }

    public function testInvalidDateFormatConversion(): void
    {
        $this->expectException(ConversionException::class);
        $this->type->convertToPHPValue('abcdefg', $this->platform);
    }
}
