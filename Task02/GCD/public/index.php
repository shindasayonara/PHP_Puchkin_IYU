<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Shindasayonara\GCD\Controller;

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $playerName = trim($_POST["playerName"] ?? "Player");
    Controller\startWebGame($playerName);
} else {
    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.php">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Игра "Наибольший общий делитель"</title>
    </head>
    <a href="players.php">Посмотреть игроков и игры</a>
    <body>
        <h2>Добро пожаловать в игру!</h2>
        <form method="post">
            <label>Введите ваше имя:</label>
            <input type="text" name="playerName" required>
            <button type="submit">Начать игру</button>
        </form>
    </body>
    </html>
    <?php
}
