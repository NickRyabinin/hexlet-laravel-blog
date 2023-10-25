[![Actions Status](https://github.com/NickRyabinin/hexlet-laravel-blog/workflows/project-check/badge.svg)](https://github.com/NickRyabinin/hexlet-laravel-blog/actions)
[![Maintainability](https://api.codeclimate.com/v1/badges/cb8075265836d93e63be/maintainability)](https://codeclimate.com/github/NickRyabinin/hexlet-laravel-blog/maintainability)
[![Test Coverage](https://api.codeclimate.com/v1/badges/cb8075265836d93e63be/test_coverage)](https://codeclimate.com/github/NickRyabinin/hexlet-laravel-blog/test_coverage)

## Blog on Laravel framework

This project is a simple blog realized with Laravel framework for education purpose

[Click this link](https://blog-ckij.onrender.com) to see deployed app.

## О блоге

Этот блог фактически представляет собой простой CRUD сущностей Article и ArticleComment, выполненный в учебных целях. Применяемый стек: PHP/Laravel/Blade/Eloquent. Аутентификация и регистрация сделаны с использованием Breeze. Стилизация - Tailwind CSS. В продакшене используется БД PostgreSQL, в локальном окружении - SQLite.

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
