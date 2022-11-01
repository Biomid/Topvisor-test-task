# Topvisor-test-task

Цель работы:
Нужно написать скрипт, выполняющий следующие действия, используя API
Google Sheets (можно использовать SDK или REST API)
A Создать таблицу с названием “Topvisor Test Task"
A Заполнить первую колонку значениями от 1 до 10.

Ход выполнения:
1. Устанавливаем расширение - composer require google/apiclient:^2.0
2. Переходим в Google Cloud Platform Console и создаём проект
3. Переходим в раздел с API и включаем нужные нам: Sheets и Drive
4. Создаём ключь сервисного аккаунта и скачиваем полученный .json файл
5. Начинаем создавать Google Sheet на основе API

Структура файлов:
1. sheet.php - создание клиента и создание таблицы с помощью нашего .json файла, результатом работы скрипта будет ID нашей таблицы
2. access.php - предаставление прав доступа нашему основному Google аккаунту, чтобы иметь визуальное представление о происходящем в таблице
3. checkAccess.php - проверка получили ли мы доступ
4. writing.php - непосредственная запись данных в таблицу
5. read.php - чтение данных из таблицы
