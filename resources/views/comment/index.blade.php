<h4 class="text-lg mt-4">
    Comments
    <a href="{{ route('articles.comments.create', $article) }}" rel="nofollow"
        class="bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
        New comment
    </a>
</h4>
@foreach ($comments as $comment)
    <p class="mt-4">{{ $comment->body }}</p>
    <div class="text-sm inline">
        Comment author: {{ $comment->user->name }}
    </div>
    <div class="text-sm inline ml-4">
        Date added: {{ $comment->created_at }}
    </div>
    <div class="mb-2"></div>
    <div class="inline">
        <a href="{{ route('articles.comments.edit', [$article, $comment]) }}" rel="nofollow"
            class="align-middle bg-transparent hover:bg-blue-500 text-blue-700 font-semibold hover:text-white py-1 px-2 border border-blue-500 hover:border-transparent rounded">
            Edit
        </a>
    </div>
    <span class="px-2"></span>
    @include('comment.delete')
@endforeach
<div class="mt-4">
    {{ $comments->links() }}
</div>
