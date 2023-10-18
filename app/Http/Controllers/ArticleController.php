<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $articles = Article::simplePaginate(5);
        return view('article.index', ['articles' => $articles]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $article = new Article();
        return view('article.create', ['article' => $article]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();
        $article = auth()->user()->articles()->create($validatedData);
        session()->flash('message', 'Article was successfully created!');
        return redirect()->route('articles.show', $article);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return view('article.show', ['article' => $article]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        return view('article.edit', ['article' => $article]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $validatedData = $request->validated();
        if (auth()->user()->id === $article->user->id) {
            $article->fill($validatedData)->save();
            session()->flash('message', 'Article was successfully updated!');
        } else {
            session()->flash('message', 'Only article\'s creator can edit article!');
        }
        return redirect()->route('articles.show', $article);
    }

    public function destroy(Article $article)
    {
        if (auth()->user()->id === $article->user->id) {
            $article->delete();
            session()->flash('message', 'Article was successfully deleted!');
        } else {
            session()->flash('message', 'Only article\'s creator can delete article!');
        }
        return redirect()->route('articles.index');
    }
}
