<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait JsonFromExternalValue
{
    abstract public function externalValue(): bool|int|float|string|array|object|null;

    public function jsonSerialize(): mixed
    {
        return $this->externalValue();
    }
}
