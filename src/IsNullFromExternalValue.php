<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait IsNullFromExternalValue
{
    abstract public function externalValue(): bool|int|float|string|array|object|null;

    public function isNull(): bool
    {
        return $this->externalValue() === null;
    }
}
