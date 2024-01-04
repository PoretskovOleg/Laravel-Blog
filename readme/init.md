## Как развернуть проект

Проект разворачивается локально. Для разворачивания проекта должен быть установлен [docker](https://docs.docker.com/)

#### Разворачивание проекта
1. Основная ветка - `main`
2. Скачать проект из Git: `git pull origin main`
3. Скопировать файл `.env.example` в `.env`
4. Создать и запустить docker контейнеры: `docker compose up -d`
5. Сгенерировать `APP_KEY`: зайти в контейнер `laravel-blog_app` и выполнить команду `php artisan key:generate`
6. Установить все зависимости проекта для backend: `composer install`
7. Установить все зависимости проекта для frontend: `npm install`
8. Выполнить миграции: `php artisan migrate`
9. Для создания тестовых данных: `php artisan db:seed` 

Проект доступен по адресу: `http://localhost:8000`

Порт можно изменить в файле `.env` в переменной `APP_BACKEND_PORT`

##### Команды для работы с docker контейнерами
1. Зайти в контейнер: `docker exec -it CONTAINER_NAME bash`
2. Остановить контейнеры: `docker compose stop`
3. Запустить контейнеры: `docker compose start`
4. Остановить и удалить контейнеры: `docker compose down`

##### Подключение к БД из локального клиента (например, DBeaver):
- host: localhost
- port: 5400
- название бд: laravel-blog_db
- login: postgres
- password: postgres

##### Для отправки писем по электронной почте в файле .env указать корректные данные
- MAIL_HOST - например, smtp.yandex.ru или smtp.mail.ru для яндекс и mail.ru соответственно
- MAIL_PORT - например, 465 для яндекс и mail.ru
- MAIL_USERNAME - адрес почтового ящика
- MAIL_PASSWORD - пароль для вашего почтового ящика
