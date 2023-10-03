@extends('layouts.app')

@section('title', 'Статьи')

@section('content')
    <h1>Список статей</h1>
    @foreach ($articles as $article)
        <h2>{{$article->name}}</h2>
        {{-- Str::limit – функция-хелпер, которая обрезает текст до указанной длины --}}
        {{-- Используется для очень длинных текстов, которые нужно сократить --}}
        <div>{{Str::limit($article->body, 200)}}</div>
    @endforeach
    <br>
    <div class="mt-4">
        {{$articles->links()}}
    </div>
@endsection
