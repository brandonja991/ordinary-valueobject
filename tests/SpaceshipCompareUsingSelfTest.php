<?php

declare(strict_types=1);

namespace Ordinary\ValueObject;

use BadMethodCallException;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

class SpaceshipCompareUsingSelfTest extends TestCase
{
    public function testCompareTo(): void
    {
        self::assertSame(-1, $this
            ->createDateTimeValueObject('2023-01-01')
            ->compareTo($this->createDateTimeValueObject('2023-01-02')));

        self::assertSame(0, $this
            ->createDateTimeValueObject('2023-01-01')
            ->compareTo($this->createDateTimeValueObject('2023-01-01')));

        self::assertSame(1, $this
            ->createDateTimeValueObject('2023-01-02')
            ->compareTo($this->createDateTimeValueObject('2023-01-01')));
    }

    public function createDateTimeValueObject(string $dateTime): ValueObjectInterface
    {
        /** @psalm-suppress MethodSignatureMismatch */
        return new class ($dateTime) extends DateTimeImmutable implements ValueObjectInterface {
            use SpaceshipCompareUsingSelf;
            use EqualsFromCompareTo;
            use IsNullFromExternalValue;
            use JsonFromExternalValue;

            /**
             * Here for psalm work around
             *
             * @param array<string|int, mixed> $data
             */
            public function __unserialize(array $data): void
            {
                parent::__unserialize($data);
            }

            public static function fromValue(mixed $value): static
            {
                throw new BadMethodCallException('Method not needed in test case, called with value: ' . $value);
            }

            public function externalValue(): bool|int|float|string|array|object|null
            {
                return 'should not matter';
            }
        };
    }
}
