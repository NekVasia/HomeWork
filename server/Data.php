<?php
require_once ("Database.php");
require_once ("Model.php");
class Data extends Model {
    public function save ($number1, $operation, $number2, $result) {
        Database::query("INSERT INTO calc (Number1, Operation, Number2, Result) VALUES ('$number1', '$operation', '$number2', '$result')");
    }
}