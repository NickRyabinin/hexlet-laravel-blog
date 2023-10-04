@extends('layouts.app')

@section('title', "Статья {$article->id}")

@section('content')
    <h1>{{$article->name}}</h1>
    <div>{{$article->body}}</div>
@endsection
