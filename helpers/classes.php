<?php
require(dirname(__FILE__, 2) . "/config/config.php");
class DB
{
    private static $pdo = null;
    public static function conn()
    {
        if (self::$pdo == null) {
            try {
                self::$pdo = new PDO("mysql:host=" . DB_HOST . ";dbname=" . DB_NAME, DB_USER, DB_PASS);
            } catch (PDOException $e) {
                print "Error!: " . $e->getMessage() . "<br/>";
                die();
            }
        }
        return self::$pdo;
    }
}
