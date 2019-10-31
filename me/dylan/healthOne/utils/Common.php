<?php

namespace me\dylan\healthOne\utils;

class Common
{
    public static function isActive(string $get, string $name): ?string
    {
        $name = strtolower($name);
        if (empty($_GET[$get])) {
            return ($name === "default") ? "active" : null;
        }
        return ($name === $_GET[$get]) ? "active" : null;
    }

    public static function linkSameParent($param, $value): string
    {
        $url = $_SERVER['REQUEST_URI'];
        $parent = substr($url, 0, strrpos($url, '&'));
        return empty($parent) ? "javascript:void(0)" : "$parent&$param=$value";
    }

    public static function checkExist($value): void
    {
        if (empty($value)) {
            exit(require_once "404.php");
        }
    }
}