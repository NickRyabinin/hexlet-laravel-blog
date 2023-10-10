@extends('layouts.app')

@section('title', 'Редактирование статьи')

@section('content')
    {{ Form::model($article, ['route' => ['articles.update', $article], 'method' => 'PATCH']) }}
    @include('article.form')
    {{ Form::submit('Обновить', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded']) }}
    {{ Form::close() }}
@endsection
