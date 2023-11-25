<?php

class Database {
// Создаем соединение в SQL
    private static $connection;
    public static function connect() {
        if (empty(self::$connection)) {
            self::$connection = mysqli_connect("localhost", "root", "", "experiment");
        }
    }
// Взаимодействие с данными SQL
    public static function query($sqlString) {
        self::connect();
        return mysqli_query(self::$connection, $sqlString);
    }
// Вывод данных с SQL
    public static function fetch($query) {
        return mysqli_fetch_assoc($query);
    }
}