<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use BadMethodCallException;
use PHPUnit\Framework\TestCase;

class SpaceshipCompareUsingExternalValueTest extends TestCase
{
    public function testCompareTo(): void
    {
        self::assertSame(-1, $this
            ->createValueObject(1)
            ->compareTo($this->createValueObject(2)));

        self::assertSame(0, $this
            ->createValueObject(1)
            ->compareTo($this->createValueObject(1)));

        self::assertSame(1, $this
            ->createValueObject(2)
            ->compareTo($this->createValueObject(1)));
    }

    public function createValueObject(int $option): ValueObjectInterface
    {
        // configure a hard coded class to be sure properties are not used in comparison
        return match ($option) {
            1 => new class () implements ValueObjectInterface {
                use SpaceshipCompareUsingExternalValue;
                use EqualsFromCompareTo;
                use IsNullFromExternalValue;
                use JsonFromExternalValue;

                public static function fromValue(mixed $value): self
                {
                    throw new BadMethodCallException('Method not needed in test case, called with value: ' . $value);
                }

                public function externalValue(): bool|int|float|string|array|object|null
                {
                    return 1;
                }
            },
            2 => new class () implements ValueObjectInterface {
                use SpaceshipCompareUsingExternalValue;
                use EqualsFromCompareTo;
                use IsNullFromExternalValue;
                use JsonFromExternalValue;

                public static function fromValue(mixed $value): self
                {
                    throw new BadMethodCallException('Method not needed in test case, called with value: ' . $value);
                }

                public function externalValue(): bool|int|float|string|array|object|null
                {
                    return 2;
                }
            }
        };
    }
}
