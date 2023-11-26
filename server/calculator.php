<?php
require_once ("Data.php");
require_once ("Doorman.php");

session_start();

$jsonData = file_get_contents('php://input');

$data = json_decode($jsonData, true); //Преобразуем данные JSON в массив

if (($data["number1"] === "") || ($data["number2"] === "") || ($data["operation"] === "")) { //Проверка на "пустые строки"
    $result = "Ошибка: Пустые поля";
} else { //Если нет ошибки, то выполняется расчет
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

    if (is_numeric($result)) { //Если "результат" численный, то записывается в SQL
        $data = new Data(); //Запись данных в SQL
        $data->save($number1, $operation, $number2, $result);
    }
}

$doorman = new Doorman(); //Выгрузка истории с SQL

echo json_encode([ //Вывод данных с SQL
    'result' => $result,
    'history' => $doorman->getHistory(),
]);
