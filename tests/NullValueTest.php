<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use BadMethodCallException;
use Generator;
use PHPUnit\Framework\TestCase;
use Throwable;

class NullValueTest extends TestCase
{
    public static function nullValueProvider(): Generator
    {
        yield [null, null];
        yield [0, UnexpectedValueException::class];
        yield ['', UnexpectedValueException::class];
        yield [false, UnexpectedValueException::class];
    }

    /**
     * @param ?class-string<Throwable> $expected
     * @dataProvider nullValueProvider
     */
    public function testFromValue(mixed $value, ?string $expected): void
    {
        if ($expected) {
            self::expectException($expected);
        }

        $nullVo = NullValue::fromValue($value);
        self::assertNull($nullVo->externalValue());
        self::assertTrue($nullVo->isNull());
    }

    public function testEqualsWithCustomObject(): void
    {
        $nullValue = NullValue::fromValue();

        $nullObj = new class () implements ValueObjectInterface {
            use EqualsFromCompareTo;
            use SpaceshipCompareUsingExternalValue;
            use JsonFromExternalValue;

            public static function fromValue(mixed $value): static
            {
                throw new BadMethodCallException('Method not needed in test case, called with value: ' . $value);
            }

            public function isNull(): bool
            {
                return true;
            }

            public function externalValue(): bool|int|float|string|array|object|null
            {
                return 'foo';
            }
        };

        self::assertSame('foo', $nullObj->externalValue());
        self::assertTrue($nullObj->isNull());
        self::assertSame(-1, $nullValue->compareTo($nullObj));
        self::assertTrue($nullValue->equals($nullObj));
    }
}
