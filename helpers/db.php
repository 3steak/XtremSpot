<?php
require_once(__DIR__ . '/../config/constants.php');

class Database
{
    private static $host = DB_HOST;
    private static $user = DB_USER;
    private static $password = DB_PASS;
    private static $dbname = DB_NAME;
    protected static $connexion = null;

    public static function connect()
    {
        // connect just once
        if (is_null(self::$connexion)) {
            $dsn = 'mysql:host=' . self::$host . ';dbname=' . self::$dbname;
            self::$connexion = new PDO($dsn, self::$user, self::$password);
            self::$connexion->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_OBJ);
            var_dump('HELLO ! ');
        }
        return self::$connexion;
    }
    // fin class 
}
