@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
    <h1 class="text-3xl">Статьи</h1>
    @foreach ($articles as $article)
        <h2 class="text-2xl py-2">
            <a href="{{ route('articles.show', $article->id) }}"
                class="align-middle hover:text-green-500">{{ $article->name }}</a>
            <a href="{{ route('articles.edit', $article->id) }}" rel="nofollow"
                class="align-middle bg-transparent hover:bg-blue-500 text-blue-700 text-base font-semibold py-1 px-2 hover:text-white border border-blue-500 hover:border-transparent rounded">
                Edit
            </a>
            <span class="px-2"></span>
            {!! Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete', 'class' => 'inline']) !!}
            {!! Form::button('Delete', [
                'type' => 'submit',
                'class' => 'align-middle bg-transparent hover:bg-red-500 text-red-700 text-base font-semibold py-0.5 px-2 hover:text-white border border-red-500 hover:border-transparent rounded',
                'onclick' => "return confirm('Are you sure?')",
            ]) !!}
            {!! Form::close() !!}
        </h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{ Str::limit($article->body, 200) }}</div>
        <p class="text-sm">Article creator: {{ $article->user->name }}</p>
    @endforeach
    <br>
    <p class="text-green-500">Нажмите на заголовок статьи для её просмотра</p>
    <div class="mt-4">
        {{ $articles->links() }}
    </div>
    <br>
    <a href="{{ route('articles.create') }}" rel="nofollow"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
        Create new
    </a>
@endsection
