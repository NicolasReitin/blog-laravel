<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;

class ArticleController extends Controller
{
    public function index()
    {        
        $articles = Article::orderBy('created_at', 'DESC')->get();


        return view('article.articles', ['articles' => $articles]); //renvoi vers la page index avec tous les articles récupérés de la bdd dans la function $groupe
    }
    public function create()
    {
        //
    }

    
    public function store()
    {
        //
    }

    public function show(article $article)
    {
        return view('article.show', compact('article')); // renvoi vers la page show 
    }

    public function edit(article $article)
    {
        //
    }

    public function update(article $article)
    {
        //
    }

    public function destroy(article $article)
    {
        //
    }

}
