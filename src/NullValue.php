<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

final class NullValue implements ValueObjectInterface
{
    use SpaceshipCompareUsingExternalValue;
    use IsNullFromExternalValue;
    use JsonFromExternalValue;

    public static function fromValue(mixed $value = null): static
    {
        assert($value === null, new UnexpectedValueException('Can not create null value object from non null value'));

        return new self();
    }

    public function externalValue(): bool|int|float|string|array|object|null
    {
        return null;
    }

    public function equals(ValueObjectInterface $valueObject): bool
    {
        return $valueObject->isNull() || $this->compareTo($valueObject) === 0;
    }
}
