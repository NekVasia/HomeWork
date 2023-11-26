<?php

require_once ("Doorman.php");

$doorman = new Doorman();

echo json_encode([ //Вывод данных с SQL
    'history' => $doorman->getHistory(),
]);