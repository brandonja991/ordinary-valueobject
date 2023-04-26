<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use JsonSerializable;

interface ValueObjectInterface extends JsonSerializable
{
    public static function fromValue(mixed $value): static;

    public function externalValue(): bool|int|float|string|array|object|null;

    public function compareTo(self $right): int;

    public function equals(self $valueObject): bool;

    public function isNull(): bool;
}
