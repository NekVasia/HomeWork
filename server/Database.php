<?php

class Database {
    private static $connection;
    public static function connect() {
        if (empty(self::$connection)) {
            self::$connection = mysqli_connect("localhost", "root", "", "experiment");
        }
    }

    public static function query($sqlString) {
        return mysqli_query(self::$connection, $sqlString);
    }

    public static function fetch($query) {
        return mysqli_fetch_assoc($query);
    }
}