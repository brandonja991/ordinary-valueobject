<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait BackedEnumValueObject
{
    use EqualsFromCompareTo;
    use JsonFromExternalValue;
    use SpaceshipCompareUsingExternalValue;

    public static function fromValue(mixed $value): self
    {
        return self::from($value);
    }

    public function isNull(): bool
    {
        return false;
    }

    public function externalValue(): string|int
    {
        return $this->value;
    }
}
