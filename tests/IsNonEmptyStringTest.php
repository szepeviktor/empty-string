<?php

declare(strict_types=1);

namespace Szepeviktor\EmptyString\Tests;

use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\TestCase;
use stdClass;

final class IsNonEmptyStringTest extends TestCase
{
    #[DataProvider('provideTruthyValues')]
    public function testItReturnsTrueForNonEmptyStrings(mixed $value): void
    {
        self::assertTrue(is_non_empty_string($value));
    }

    #[DataProvider('provideFalsyValues')]
    public function testItReturnsFalseForEmptyStringsAndNonStrings(mixed $value): void
    {
        self::assertFalse(is_non_empty_string($value));
    }

    /**
     * @return array<string, array{0: mixed}>
     */
    public static function provideTruthyValues(): array
    {
        return [
            'plain string' => ['hello'],
            'numeric string' => ['123'],
            'whitespace-only string' => ['   '],
            'string zero' => ['0'],
        ];
    }

    /**
     * @return array<string, array{0: mixed}>
     */
    public static function provideFalsyValues(): array
    {
        return [
            'empty string' => [''],
            'integer' => [123],
            'float' => [12.3],
            'boolean true' => [true],
            'boolean false' => [false],
            'array' => [[1, 2, 3]],
            'object' => [new stdClass()],
            'null' => [null],
        ];
    }
}
