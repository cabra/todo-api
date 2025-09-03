# Task Management API

Простое REST API для управления задачами (CRUD) на Laravel 12.
## Технологии

- **PHP 8.3**
- **Laravel 12**
- **MySQL**
- **REST API**

## Возможности

- ✅ Создание задач
- ✅ Просмотр списка задач
- ✅ Просмотр отдельной задачи
- ✅ Обновление задач
- ✅ Удаление задач
- ✅ Валидация данных
- ✅ Обработка ошибок

## Структура проекта

```
todo-api/
├── app/
│   ├── Models/
│   │   └── Task.php
│   └── Http/
│       └── Controllers/
│           └── TaskController.php
├── config/
├── database/
│   ├── migrations/
│   │   └── 2025_09_02_000000_create_tasks_table.php
│   └── seeders/
├── routes/
│   ├── api.php          # API маршруты
│   └── web.php          # Веб-маршруты
├── tests/
├── requests.http        # Файл для тестирования в PHPStorm
└── README.md
```

## Установка и запуск

### 1. Клонирование репозитория
```bash
git clone https://github.com/cabra/todo-api.git
cd todo-api
```

### 2. Установка зависимостей
```bash
composer install
```

### 3. Настройка окружения
```bash
cp .env.example .env
php artisan key:generate
```

### 4. Настройка базы данных MySQL

Отредактируйте файл `.env`:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=todo_api
DB_USERNAME=root
DB_PASSWORD=your_password
```

Создайте базу данных в MySQL:
```sql
CREATE DATABASE todo_api;
```

### 5. Выполнение миграций
```bash
php artisan migrate
```

### 6. Запуск сервера
```bash
php artisan serve
```

Приложение будет доступно по адресу: `http://localhost:8000`

## API Endpoints

### Получить все задачи
```http
GET /api/tasks
```

### Создать задачу
```http
POST /api/tasks
Content-Type: application/json

{
  "title": "Название задачи",
  "description": "Описание задачи",
  "status": "pending"
}
```

### Получить задачу по ID
```http
GET /api/tasks/{id}
```

### Обновить задачу
```http
PUT /api/tasks/{id}
Content-Type: application/json

{
  "title": "Обновленное название",
  "status": "completed"
}
```

### Удалить задачу
```http
DELETE /api/tasks/{id}
```

## Тестирование API

### Встроенный HTTP-клиент PHPStorm
В корне проекта есть файл `requests.http` с готовыми запросами для тестирования:

```bash
# Запуск тестовых запросов в PHPStorm
# Нажмите ▶️ рядом с каждым запросом
```

### Альтернативные инструменты:
- [Postman](https://www.postman.com/)
- [Thunder Client](https://www.thunderclient.io/) (расширение для VS Code)
- curl (командная строка)

## Примеры использования

### Создание задачи
```bash
curl -X POST http://localhost:8000/api/tasks \
  -H "Content-Type: application/json" \
  -d '{
    "title": "Изучить Laravel",
    "description": "Освоить основы фреймворка",
    "status": "pending"
  }'
```

### Получение всех задач
```bash
curl -X GET http://localhost:8000/api/tasks
```

## Валидация

- `title`: обязательное поле, строка, максимум 255 символов
- `description`: необязательное поле, строка
- `status`: одно из значений: `pending`, `in_progress`, `completed`

## Обработка ошибок

API возвращает соответствующие HTTP-статусы:
- `200 OK` - успешный запрос
- `201 Created` - задача создана
- `422 Unprocessable Entity` - ошибка валидации
- `404 Not Found` - задача не найдена

## Требования к окружению

- PHP 8.2+
- Composer 2.0+
- MySQL 8.0+
- Laravel 12

## Разработчик

Валентина Павлова - cabra.beast@gmail.com
