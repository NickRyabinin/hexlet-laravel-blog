@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
    <h1 class="text-3xl">Список статей</h1>
    @foreach ($articles as $article)
        <h2 class="text-2xl py-2">
            <a href="{{ route('articles.show', $article->id) }}" class="align-middle">{{ $article->name }}</a>
            <a href="{{ route('articles.edit', $article->id) }}"
                class="align-middle bg-transparent hover:bg-blue-500 text-blue-700 text-base font-semibold py-1 px-2 hover:text-white border border-blue-500 hover:border-transparent rounded">
                Edit
            </a>
        </h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{ Str::limit($article->body, 200) }}</div>
    @endforeach
    <br>
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
    <br>
    <a href="{{ route('articles.create') }}"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Create new
    </a>
@endsection
