<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait SpaceshipCompareUsingExternalValue
{
    abstract public function externalValue(): bool|int|float|string|array|object|null;

    public function compareTo(ValueObjectInterface $right): int
    {
        return $this->externalValue() <=> $right->externalValue();
    }
}
