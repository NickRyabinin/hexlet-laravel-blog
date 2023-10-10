@extends('layouts.app')

@section('title', 'Новая статья')

@section('content')
    {{ Form::model($article, ['route' => ['articles.store', $article]]) }}
    @include('article.form')
    {{ Form::submit('Create', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded']) }}
    {{ Form::close() }}
@endsection
