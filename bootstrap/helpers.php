<?php

use Illuminate\Support\Facades\App;

if (! function_exists('codebarista_path')) {
    function codebarista_path(string $path = ''): string
    {
        return App::joinPaths(dirname(__DIR__), $path);
    }
}

if (! function_exists('pngcrush')) {
    function pngcrush(string $image): bool
    {
        $format = 'pngcrush -d %s -q -rem alla %s > /dev/null 2>&1';
        $dir = rtrim(sys_get_temp_dir(), DIRECTORY_SEPARATOR);
        $name = basename($image);

        $command = sprintf($format, $dir, escapeshellarg($image));

        if (exec($command) !== false) {
            return rename($dir.DIRECTORY_SEPARATOR.$name, $image);
        }

        return false;
    }
}
