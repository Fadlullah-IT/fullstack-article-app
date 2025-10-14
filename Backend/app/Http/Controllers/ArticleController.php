<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show'])
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::with('user')->latest()->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // create a new Resource
    {
        $fields =  $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        $article = $request->user()->articles()->create($fields);

        return ['article' => $article, 'user' => $article->user];
    }

    /** 
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return  ['article' => $article, 'user' => $article->user];
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        Gate::authorize('modify', $article);
        $fields =  $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255'
        ]);

        $article->update($fields);

        return  $article;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        $article->delete();

        return ['message' => 'The article was deleted'];
    }
}
