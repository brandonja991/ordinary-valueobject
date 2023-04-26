<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use Generator;
use Ordinary\ValueObject\Test\TestEnum;
use PHPUnit\Framework\TestCase;

class BackedEnumValueObjectTest extends TestCase
{
    public static function enumProvider(): Generator
    {
        foreach (TestEnum::cases() as $case) {
            yield [$case];
        }
    }

    /** @dataProvider enumProvider */
    public function testIsNull(TestEnum $case): void
    {
        self::assertFalse($case->isNull());
    }

    /** @dataProvider enumProvider */
    public function testExternalValue(TestEnum $case): void
    {
        self::assertSame($case->value, $case->externalValue());
    }

    /** @dataProvider enumProvider */
    public function testFromValue(TestEnum $case): void
    {
        self::assertSame($case, TestEnum::fromValue($case->value));
    }
}
