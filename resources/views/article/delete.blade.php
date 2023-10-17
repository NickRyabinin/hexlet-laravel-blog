{{ Form::open(['route' => ['articles.destroy', $article->id], 'method' => 'delete', 'class' => 'inline']) }}
{{ Form::button('Delete', [
    'type' => 'submit',
    'class' =>
        'align-middle bg-transparent hover:bg-red-500 text-red-700 text-base font-semibold py-0.5 px-2 hover:text-white border border-red-500 hover:border-transparent rounded',
    'onclick' => "return confirm('Are you sure?')",
]) }}
{{ Form::close() }}
