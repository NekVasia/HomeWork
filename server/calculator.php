<?php
require_once ("server/Database.php");
require_once ("server/Data.php");
require_once ("server/Model.php");
require_once ("server/Doorman.php");

$jsonData = file_get_contents('php://input');

// Преобразуем данные JSON в массив
$data = json_decode($jsonData, true);

if (empty($data["number1"]) || empty($data["number2"]) || empty($data["operation"])) {
    echo("Ошибка");
}

$number1 = $data["number1"];
$number2 = $data["number2"];
$operation = $data["operation"];

$result = match ($operation) {
    "+" => $number1 + $number2,
    "-" => $number1 - $number2,
    "×" => $number1 * $number2,
    "÷" => $number2 !== 0 ? $number1 / $number2 : "Деление на 0",
    default => "Ошибка в расчетах",
};

$response = ["result" => $result];

echo(json_encode($response));

$data = new Data();
$doorman = new Doorman();
$data->save($number1, $operation, $number2, $result);
$history = $doorman->loadHistory();
