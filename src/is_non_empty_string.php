<?php

declare(strict_types=1);

function is_non_empty_string(mixed $value): bool
{
    return is_string($value) && $value !== '';
}
