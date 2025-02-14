<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Shindasayonara\GCD\Database;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $playerName = trim($_POST["playerName"]);
    $num1 = (int) $_POST["num1"];
    $num2 = (int) $_POST["num2"];
    $correctGCD = (int) $_POST["correctGCD"];
    $playerAnswer = (int) $_POST["playerAnswer"];

    $result = ($playerAnswer === $correctGCD) ? "Верно!" : "Неверно. Правильный ответ: $correctGCD";

    // Сохраняем в БД
    Database\saveGame($playerName, $num1, $num2, $correctGCD, $playerAnswer, $result);
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.php">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Результат</title>
    </head>
    <body>
        <h2>Результат</h2>
        <p><?php echo $result ?></p>
        <a href="index.php">Играть снова</a>
    </body>
    </html>
    <?php
}
