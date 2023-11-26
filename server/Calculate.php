<?php
class Calculate {
    function calculator ($number1, $operation, $number2){
        $result = match ($operation) {
            "+" => $number1 + $number2,
            "-" => $number1 - $number2,
            "×" => $number1 * $number2,
            "÷" => $number2 != 0 ? $number1 / $number2 : "Ошибка: Деление на 0",
            default => "Ошибка в расчетах",
        };
        return $result;
    }
}