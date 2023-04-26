<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

trait SpaceshipCompareUsingSelf
{
    public function compareTo(ValueObjectInterface $right): int
    {
        return $this <=> $right;
    }
}
