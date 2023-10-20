@extends('layouts.app')

@section('title', 'Редактирование комментария')

@section('content')
    {{ Form::model($comment, ['route' => ['articles.comments.update', [$article, $comment]], 'method' => 'PATCH']) }}
    @include('comment.form')
    {{ Form::submit('Edit', ['class' => 'bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded']) }}
    {{ Form::close() }}
@endsection
