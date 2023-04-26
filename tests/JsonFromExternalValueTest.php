<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use PHPUnit\Framework\TestCase;

class JsonFromExternalValueTest extends TestCase
{
    use CreateValueObjectFromValue;

    public function testJsonSerialize(): void
    {
        $vo = $this->createValueObject(['foo' => 'bar']);
        self::assertSame(['foo' => 'bar'], $vo->jsonSerialize());
        self::assertJsonStringEqualsJsonString('{"foo": "bar"}', json_encode($vo));
    }
}
