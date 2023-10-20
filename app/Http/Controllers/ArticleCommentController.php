<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\ArticleComment;
use Illuminate\Http\Request;

class ArticleCommentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Article $article)
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Article $article)
    {
        $comment = new ArticleComment();
        return view('comment.create', ['article' => $article, 'comment' => $comment]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request, Article $article)
    {
        $validatedData = $request->validate([

            'body' => 'required|string|min:3|max:1000',

        ]);
        $comment = $article->comments()->make();
        $comment->user()->associate(auth()->user());
        $comment->fill($validatedData)->save();
        session()->flash('message', 'Comment was successfully created!');
        return redirect()->route('articles.show', [$article, $comment]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article, ArticleComment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article, ArticleComment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article, ArticleComment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article, ArticleComment $comment)
    {
        //
    }
}
