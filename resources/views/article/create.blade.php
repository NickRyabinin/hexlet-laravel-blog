@extends('layouts.app')

@section('title', 'Новая статья')

@section('content')
    {{ Form::model($article, ['route' => 'articles.store']) }}
    @include('article.form')
    {{ Form::submit('Создать', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded']) }}
    {{ Form::close() }}
@endsection
