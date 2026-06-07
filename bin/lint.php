<?php

declare(strict_types=1);

$paths = ['src', 'tests'];
$phpBinary = escapeshellarg(PHP_BINARY);

foreach ($paths as $path) {
    $iterator = new RecursiveIteratorIterator(
        new RecursiveDirectoryIterator($path, FilesystemIterator::SKIP_DOTS)
    );

    foreach ($iterator as $fileInfo) {
        if (! $fileInfo->isFile() || $fileInfo->getExtension() !== 'php') {
            continue;
        }

        $file = $fileInfo->getPathname();
        passthru(sprintf('%s -l %s', $phpBinary, escapeshellarg($file)), $exitCode);

        if ($exitCode !== 0) {
            exit($exitCode);
        }
    }
}
