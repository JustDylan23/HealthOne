<?php

namespace me\dylan\healthOne;

use \PDO;
use \PDOException;

class DBConnection
{
    private static $connection;

    private function __construct()
    {
    }

    public static function getConnection(): PDO
    {
        if (empty(self::$connection)) {
            try {
                self::$connection = new PDO("mysql:host=localhost;dbname=health_one", "root", "");
                self::$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            } catch (PDOException $e) {
                exit("Error!: " . $e->getMessage());
            }
        }
        return self::$connection;
    }
}