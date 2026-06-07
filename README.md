# szepeviktor/empty-string

Minimal Composer package that exposes one global helper:

```php
is_non_empty_string(mixed $value): bool
```

It returns `true` only when the value is a string and not exactly `''`.

## Installation

```bash
composer require szepeviktor/empty-string
```

## Usage

```php
<?php

require __DIR__ . '/vendor/autoload.php';

is_non_empty_string('hello'); // true
is_non_empty_string('   ');   // true
is_non_empty_string('');      // false
is_non_empty_string(123);     // false
```

## Contract

- `true` for any string except `''`
- `true` for whitespace-only strings
- `false` for all non-string values

## Local QA

```bash
composer lint
composer phpunit
composer phpstan
composer qa
```
