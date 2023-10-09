@extends('layouts.app')

@section('title', "Статья {$article->id}")

@section('content')
    <h1 class="text-2xl">{{$article->name}}</h1>
    <div>{{$article->body}}</div>
    <br>
    <a href="{{ route('articles.edit', $article->id) }}" rel="nofollow"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-2 px-4 border border-blue-500 hover:border-transparent rounded">
        Edit
    </a>
@endsection
