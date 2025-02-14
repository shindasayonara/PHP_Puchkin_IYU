<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Shindasayonara\GCD\Database;

Database\clearDatabase();
echo "База данных успешно очищена!";
?>
<br>
<a href="index.php">Вернуться на главную</a>
