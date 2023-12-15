@extends('layouts.app')

@section('title', 'О блоге')
@section('header', 'О блоге')

@section('content')
    <section>
        <p class="my-4">Этот блог фактически представляет собой простой CRUD сущностей Article и ArticleComment,
            выполненный в учебных целях. Применяемый стек: PHP/Laravel/Blade/Eloquent. Регистрация и аутентификация
            сделаны с использованием Breeze (при сбросе пароля пользователя email на реальный адрес не отправляется,
            вместо этого используется сервис mailtrap.io). Стилизация - Tailwind CSS. В продакшене используется
            БД PostgreSQL, в локальном окружении - SQLite. Есть локализация панели навигации (посредством middleware),
            в зависимости от настроек языка, предпочитаемого для отображения страниц в браузере. Частично реализованы
            функциональные тесты. Также имеется возможность экспортировать сущность Article в файл 'articles.xlsx'
            (применена библиотека maatwebsite/excel).</p>
        <p>Upd: добавлено отображение ip клиента, локации, соответствующей этому ip (ip-api.com) и текущей температуры
            в этой локации (api.open-meteo.com).</p>
        <p class="my-4">Теги: {{ implode(', ', $tags) }}</p>
    </section>
    <div class="text-right text-sm text-gray-500">
        <p>Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})</p>
        @asyncWidget('LocationWidget')
    </div>
@endsection
