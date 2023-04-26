<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use BadMethodCallException;

trait CreateValueObjectFromValue
{
    public function createValueObject(mixed $value): ValueObjectInterface
    {
        // configure a hard coded class to be sure properties are not used in comparison
        return new class ($value) implements ValueObjectInterface {
            use SpaceshipCompareUsingExternalValue;
            use EqualsFromCompareTo;
            use IsNullFromExternalValue;
            use JsonFromExternalValue;

            public function __construct(private mixed $value)
            {
            }

            public static function fromValue(mixed $value): static
            {
                throw new BadMethodCallException('Method not needed in test case, called with value: ' . $value);
            }

            public function externalValue(): bool|int|float|string|array|object|null
            {
                return $this->value;
            }
        };
    }
}
