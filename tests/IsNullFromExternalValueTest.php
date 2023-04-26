<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use PHPUnit\Framework\TestCase;

class IsNullFromExternalValueTest extends TestCase
{
    use CreateValueObjectFromValue;

    public function testIsNull(): void
    {
        $nullVo = $this->createValueObject(null);
        self::assertNull($nullVo->externalValue());
        self::assertTrue($nullVo->isNull());

        $notNullVo = $this->createValueObject('foo');
        self::assertSame('foo', $notNullVo->externalValue());
        self::assertFalse($notNullVo->isNull());
    }
}
