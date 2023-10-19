<h4 class="text-l">Комментарии к статье</h4>
@foreach ($comments as $comment)
    <p>{{ $comment->body }}</p>
@endforeach
