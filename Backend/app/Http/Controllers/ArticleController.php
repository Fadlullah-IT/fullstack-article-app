<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Routing\Controllers\HasMiddleware;
use Illuminate\Routing\Controllers\Middleware;
use Illuminate\Support\Facades\Gate;

class ArticleController extends Controller implements HasMiddleware
{
    public static function middleware()
    {
        return [
            new Middleware('auth:sanctum', except: ['index', 'show']) //protection but allow public access to reading articles
        ];
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Article::with('user')->latest()->get(); //eager loading with.... 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) // create a new Resource
    {
        $fields =  $request->validate([
            'title' => 'required|max:255',
            'body' => 'required|max:255',

        ]);


        $article = $request->user()->articles()->create($fields);

        return ['article' => $article, 'user' => $article->user]; // JSON response
    }

    /** 
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        return  ['article' => $article, 'user' => $article->user]; //auto attached A thru route-model binding 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    { //security check to ensure only auth users can edit
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
        $article->delete(); //gets thru route binding

        return ['message' => 'The article was deleted'];
    }
}
