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
    <a href="{{ route('articles.destroy', $article->id) }}" data-confirm="Вы уверены?" data-method="delete" rel="nofollow"
        class="align-middle bg-transparent hover:bg-red-500 text-red-700 text-base font-semibold py-1 px-2 hover:text-white border border-red-500 hover:border-transparent rounded">
        Delete
    </a>
@endsection
