<?php

namespace App\Http\Controllers;

use App\Models\Article;
use Illuminate\Http\Request;
use App\Models\Version_morceau;


class HomeController extends Controller
{
    public function index()
    {        
        $articles = Article::orderBy('created_at', 'DESC')->get();
        
        return view('home', ['articles' => $articles]); //renvoi vers la page index avec tous les articles récupérés de la bdd dans la function $groupe
    }
}