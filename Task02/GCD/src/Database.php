<?php

namespace Shindasayonara\GCD\Database;

use PDO;

function getDBConnection()
{
    $dbPath = __DIR__ . '/../db/database.sqlite';
    return new PDO("sqlite:$dbPath");
}

function saveGame($playerName, $num1, $num2, $gcd, $answer, $result)
{
    $pdo = getDBConnection();

    // Проверяем, есть ли игрок
    $stmt = $pdo->prepare("SELECT id FROM players WHERE name = ?");
    $stmt->execute([$playerName]);
    $player = $stmt->fetch(PDO::FETCH_ASSOC);

    // Если игрока нет, добавляем
    if (!$player) {
        $stmt = $pdo->prepare("INSERT INTO players (name) VALUES (?)");
        $stmt->execute([$playerName]);
        $playerId = $pdo->lastInsertId();
    } else {
        $playerId = $player['id'];
    }

    // Записываем игру
    $stmt = $pdo->prepare("INSERT INTO games (player_id, number1, number2, gcd, player_answer, result) VALUES (?, ?, ?, ?, ?, ?)");
    $stmt->execute([$playerId, $num1, $num2, $gcd, $answer, $result]);
}

function getPlayersWithGames()
{
    $pdo = getDBConnection();
    $stmt = $pdo->query(
        "
    SELECT players.name, 
           DATETIME(games.played_at, '+3 hours') AS played_at, 
           games.number1, games.number2, games.gcd, games.player_answer, games.result 
    FROM games 
    JOIN players ON games.player_id = players.id
    ORDER BY games.played_at DESC
"
    );


    return $stmt->fetchAll(PDO::FETCH_ASSOC);
}

function clearDatabase()
{
    $pdo = getDBConnection();
    $pdo->exec("DELETE FROM games;");
    $pdo->exec("DELETE FROM players;");
}
