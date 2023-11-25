<?php
require_once ("Data.php");
require_once ("Doorman.php");

$jsonData = file_get_contents('php://input');

// Преобразуем данные JSON в массив
$data = json_decode($jsonData, true);

if (($data["number1"] === "") || ($data["number2"] === "") || ($data["operation"] === "")) {
    $result = "Ошибка: Пустые поля";
} else {
    $number1 = $data["number1"];
    $number2 = $data["number2"];
    $operation = $data["operation"];

    $result = match ($operation) {
        "+" => $number1 + $number2,
        "-" => $number1 - $number2,
        "×" => $number1 * $number2,
        "÷" => $number2 != 0 ? $number1 / $number2 : "Ошибка: Деление на 0",
        default => "Ошибка в расчетах",
    };

    if (is_numeric($result)) {
        $data = new Data();
        $data->save($number1, $operation, $number2, $result);
    }
}

$doorman = new Doorman();

echo json_encode([
    'result' => $result,
    'history' => $doorman->getHistory(),
]);
