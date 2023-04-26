<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait EqualsFromCompareTo
{
    abstract public function compareTo(ValueObjectInterface $right): int;

    public function equals(ValueObjectInterface $valueObject): bool
    {
        return $this->compareTo($valueObject) === 0;
    }
}
