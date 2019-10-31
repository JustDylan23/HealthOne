<?php

namespace me\dylan\healthOne\utils;

class Validate
{
    public static function int(&$int, int $min = null, int $max = null): bool
    {
        $int = filter_var($int, FILTER_VALIDATE_INT);
        if ($int === false) {
            return false;
        } else {
            return $int >= $min && ($max === null || $int <= $max);
        }
    }

    public static function float(&$float, int $min = null, int $max = null): bool
    {
        $float = filter_var($float, FILTER_VALIDATE_FLOAT);
        if ($float === false) {
            return false;
        } else {
            return $float >= $min && ($max === null || $float <= $max);
        }
    }

    public static function date(string &$date, string $format = "Y-m-d"): bool
    {
        $d = DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) === $date;
    }
}