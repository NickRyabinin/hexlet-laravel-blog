@extends('layouts.app')

@section('title', "Статья {$article->id}")

@section('content')
    <h1 class="text-2xl">{{ $article->name }}</h1>
    <div>{{ $article->body }}</div>
    <br>
    <a href="{{ route('articles.edit', $article->id) }}" rel="nofollow"
        class="align-middle bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
        Edit
    </a>
    <span class="px-2"></span>
    @include('article.delete')
    @include('comment.index')
@endsection
