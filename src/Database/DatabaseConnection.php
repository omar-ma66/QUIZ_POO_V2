<?php
class DatabaseConnection
{
    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {
        if (self::$instance === null) {
            self::$instance = PDOConnect("../../config/param");
        }
        return self::$instance;
    }

}
?>