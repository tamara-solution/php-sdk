<?php

declare(strict_types=1);

namespace Tamara\Helper;

class StringHelper
{
    public static function camelize(string $input, string $separator = '_'): string
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
