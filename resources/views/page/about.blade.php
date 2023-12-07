@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'О блоге')

@section('header', 'О блоге')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <p class="mt-4">Этот блог фактически представляет собой простой CRUD сущностей Article и ArticleComment, выполненный в учебных целях.
        Применяемый стек: PHP/Laravel/Blade/Eloquent. Аутентификация и регистрация сделаны с использованием Breeze.
        Стилизация - Tailwind CSS.
        В продакшене используется БД PostgreSQL, в локальном окружении - SQLite.</p>
    <p class="my-4">Теги: {{ implode(', ', $tags) }}</p>
    <div class="my-4">
        Температура сейчас где-то в Мордовии: {{ $currentTemperature }}°C
    </div>
    <div class="ml-4 text-center text-sm text-gray-500 dark:text-gray-400 sm:text-right sm:ml-0">
        Laravel v{{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
    </div>
@endsection
