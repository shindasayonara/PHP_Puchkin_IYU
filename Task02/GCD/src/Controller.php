<?php

namespace Shindasayonara\GCD\Controller;

use Shindasayonara\GCD\View;
use Shindasayonara\GCD\Database;

function startGame()
{
    // Генерируем два случайных числа от 10 до 100
    $num1 = rand(10, 100);
    $num2 = rand(10, 100);
    
    // Вычисляем НОД
    $correctGCD = gcd($num1, $num2);

    // Показываем игроку числа
    View\displayQuestion($num1, $num2);

    // Получаем ввод от пользователя
    $playerAnswer = (int) trim(fgets(STDIN));

    // Проверяем ответ
    $result = ($playerAnswer === $correctGCD) ? "Верно!" : "Неверно. Правильный ответ: $correctGCD";

    // Выводим результат
    View\displayResult($result);

    // Сохраняем в БД (игрока пока можно назвать "Player")
    Database\saveGame("Player", $num1, $num2, $correctGCD, $playerAnswer, $result);
}

function startWebGame($playerName)
{
    $num1 = rand(10, 100);
    $num2 = rand(10, 100);
    $correctGCD = gcd($num1, $num2);

    ?>
    <!DOCTYPE html>
    <html lang="ru">
    <head>
        <link rel="stylesheet" type="text/css" href="styles.php">

        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Игра</title>
    </head>
    <body>
        <h2>Привет, <?php echo htmlspecialchars($playerName) ?>! Найди НОД:</h2>
        <p>Числа: <b><?php echo $num1 ?></b> и <b><?php echo $num2 ?></b></p>
        <form method="post" action="result.php">
            <input type="hidden" name="playerName" value="<?php echo htmlspecialchars($playerName) ?>">
            <input type="hidden" name="num1" value="<?php echo $num1 ?>">
            <input type="hidden" name="num2" value="<?php echo $num2 ?>">
            <input type="hidden" name="correctGCD" value="<?php echo $correctGCD ?>">
            <label>Введите ваш ответ:</label>
            <input type="number" name="playerAnswer" required>
            <button type="submit">Проверить</button>
        </form>
    </body>
    </html>
    <?php
}


// Функция для вычисления НОД (Алгоритм Евклида)
function gcd($a, $b)
{
    return $b == 0 ? $a : gcd($b, $a % $b);
}
