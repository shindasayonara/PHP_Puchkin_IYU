# GCD Game

**GCD Game** — это консольная игра, в которой игроку предлагается вычислить наибольший общий делитель (НОД) двух чисел. Игра разработана на языке PHP с использованием Composer для управления зависимостями и автоматической загрузки файлов.

## Установка

### Локальная установка
1. Клонируйте репозиторий:
   ```bash
   git clone https://github.com/shindasayonara/GCD_Game.git
   cd Game_name
2. Установите зависимости через Composer:
    ```bash
    composer install
- Запустите игру:
    ```bash
    php bin/gcd
### Установка через Packagist
1. Убедитесь, что Composer установлен глобально.
2. Установите игру:
    ```bash
    composer global require shindasayonara/php_puchkin_iyu
3. Запустите игру из командной строки:
    ```bash
    gcd
## Используемые технологии
- PHP — основной язык разработки.
- Composer — для управления зависимостями и автозагрузки.
- wp-cli/php-cli-tools — библиотека для удобного ввода/вывода в консоли.
## Структура проекта

Task01/GCD \
├── bin/ \
│   └── gcd       # Запускной файл игры \
├── src/ \
│   ├── Controller.php        # Логика управления игрой \
│   └── View.php              # Функции отображения \
├── composer.json             # Файл конфигурации Composer \
└── README.md                 # Описание проекта 
## Как играть
После запуска игры на экране появятся два числа. Ваша задача — найти их наибольший общий делитель. Для этого:

- Введите ответ и нажмите Enter.
Если ваш ответ правильный, игра предложит новую задачу.
В случае ошибки игра завершится.
Пример игры:

```bash
    Find the greatest common divisor of the given numbers.
    Question: 18 24
    Your answer: 6
    Correct!
```
## Ссылки
- Packagist: [GCD Game](https://packagist.org/packages/shindasayonara/php_puchkin_iyu)
- [Репозиторий на GitHub](https://github.com/shindasayonara/GCD_Game)
- Автор: shindasayonara
- Лицензия: MIT
