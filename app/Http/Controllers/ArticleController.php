<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Article;
use Illuminate\Support\Facades\Session;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {
        $articles = Article::simplePaginate(5);

        // Статьи передаются в шаблон
        // compact('articles') => [ 'articles' => $articles ]
        return view('article.index', compact('articles'));
    }

    public function show($id)
    {
        $article = Article::findOrFail($id);
        return view('article.show', compact('article'));
    }

    public function create()
    {
        // Передаем в шаблон вновь созданный объект. Он нужен для вывода формы через Form::model
        $article = new Article();
        return view('article.create', compact('article'));
    }

    public function store(ArticleRequest $request)
    {
        // Проверка введенных данных
        // Если будут ошибки, то возникнет исключение
        // Иначе возвращаются данные формы
        $validatedData = $request->validated();

        $article = new Article();
        // Заполнение статьи данными из формы
        $article->fill($validatedData);
        // При ошибках сохранения возникнет исключение
        $article->save();

        session()->flash('message', 'Article successfully created.');

        // Редирект на указанный маршрут
        return redirect()
            ->route('articles.index');
    }

    public function edit($id)
    {
        $article = Article::findOrFail($id);
        return view('article.edit', compact('article'));
    }

    public function update(ArticleRequest $request, $id)
    {
        $article = Article::findOrFail($id);
        $validatedData = $request->validated();

        $article->fill($validatedData);
        $article->save();

        session()->flash('message', 'Article successfully updated.');

        return redirect()
            ->route('articles.index');
    }
}
