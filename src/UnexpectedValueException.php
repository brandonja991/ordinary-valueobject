<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use UnexpectedValueException as PhpUnexpectedValueException;

class UnexpectedValueException extends PhpUnexpectedValueException implements ValueObjectException
{
}
