<h4 class="text-lg mt-4">
    Comments
    <a href="{{ route('articles.comments.create', $article) }}" rel="nofollow"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
        New comment
    </a>
</h4>
@foreach ($comments as $comment)
    <p>{{ $comment->body }}</p>
@endforeach
