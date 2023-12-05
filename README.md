[![project-check](https://github.com/NickRyabinin/hexlet-laravel-blog/actions/workflows/project-check.yml/badge.svg)](https://github.com/NickRyabinin/hexlet-laravel-blog/actions/workflows/project-check.yml)
[![Maintainability](https://api.codeclimate.com/v1/badges/cb8075265836d93e63be/maintainability)](https://codeclimate.com/github/NickRyabinin/hexlet-laravel-blog/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/cb8075265836d93e63be/test_coverage)](https://codeclimate.com/github/NickRyabinin/hexlet-laravel-blog/test_coverage)

## Blog on Laravel framework

This project is a simple blog realized with Laravel framework for education purpose

[Click this link](https://blog-ckij.onrender.com) to see deployed app.

## О блоге

Этот блог фактически представляет собой простой CRUD сущностей Article и ArticleComment, выполненный в учебных целях. Применяемый стек: PHP/Laravel/Blade/Eloquent. Регистрация и аутентификация сделаны с использованием Breeze (при сбросе пароля пользователя email на реальный адрес не отправляется, вместо этого используется сервис mailtrap.io). Стилизация - Tailwind CSS. В продакшене используется БД PostgreSQL, в локальном окружении - SQLite. Есть локализация панели навигации, в зависимости от настроек языка, предпочитаемого для отображения страниц в браузере. Частично реализованы функциональные тесты. Также имеется возможность экспортировать сущность Article в файл 'articles.xlsx' (применена библиотека maatwebsite/excel).

Посмотреть задеплоенный проект можно [по этой ссылке](https://blog-ckij.onrender.com).

### Требования:
PHP >= 8.1

Composer

Node.js

npm

### Локальная установка:
```bash
git clone git@github.com:NickRyabinin/hexlet-laravel-blog.git

make install

make setup
```
### Линтинг и тестирование:
```bash
make check
```
### Локальный запуск:
```bash
make start
```
