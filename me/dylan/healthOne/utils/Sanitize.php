<?php

namespace me\dylan\healthOne\utils;

class Sanitize
{
    public static function string(&$string): void
    {
        $string = filter_var(trim($string), FILTER_SANITIZE_STRING);
    }

    public static function name(&$string): void
    {
        self::string($string);
        $string = ucwords($string);
    }

    public static function bitBool(&$bool): void
    {
        $bool = ($bool == 1) ? true : false;
    }

    public static function round(float &$float, int $precision): void
    {
        $float = round($float, $precision);
    }
}