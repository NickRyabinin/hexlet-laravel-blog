@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'О блоге')

@section('header', 'О блоге')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <p class="mt-4">Этот блог фактически представляет собой простой CRUD сущности Article, выполненный в учебных целях с использованием фреймворка Laravel</p>
    <p class="my-4">Теги: {{ implode(', ', $tags) }}</p>
    <p>Текущая локаль - {{ str_replace('_', '-', app()->getLocale()) }}</p>
@endsection
