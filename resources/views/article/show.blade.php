@extends('layouts.app')

@section('title', "Статья {$article->id}")

@section('content')
    <h1 class="text-2xl">{{$article->name}}</h1>
    <div>{{$article->body}}</div>
@endsection
