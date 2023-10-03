@extends('layouts.app')

<!-- Секция, содержимое которой обычный текст. -->
@section('title', 'О блоге')

@section('header', 'О блоге')

<!-- Секция, содержащая HTML блок. Имеет открывающую и закрывающую часть. -->
@section('content')
    <p>Эксперименты с Laravel на Хекслете</p>
    <p>{{ implode(', ', $tags) }}</p>
    <p>Текущая локаль - {{ str_replace('_', '-', app()->getLocale()) }}</p>
@endsection

