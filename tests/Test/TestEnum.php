<?php

declare(strict_types=1);

namespace Ordinary\ValueObject\Test;

use Ordinary\ValueObject\BackedEnumValueObject;
use Ordinary\ValueObject\ValueObjectInterface;

enum TestEnum: string implements ValueObjectInterface
{
    use BackedEnumValueObject;

    case Foo = 'foo';
    case Bar = 'bar';
    case Baz = 'baz';
}
