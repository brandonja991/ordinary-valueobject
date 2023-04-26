<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use PHPUnit\Framework\TestCase;

class EqualsFromCompareToTest extends TestCase
{
    use CreateValueObjectFromValue;

    public function testEquals(): void
    {
        $a = $this->createValueObject('foo');
        $b = $this->createValueObject('foo');
        $c = $this->createValueObject('bar');

        self::assertTrue($a->equals($a));
        self::assertTrue($a->equals($b));
        self::assertTrue($b->equals($a));

        self::assertFalse($a->equals($c));
        self::assertFalse($c->equals($a));
    }
}
