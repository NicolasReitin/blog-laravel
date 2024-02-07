<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{

    public function index()
    {
            $tags = Tag::all();
    
            return view('home', ['tags' => $tags]); //renvoi vers la page index avec tous les articles récupérés de la bdd dans la function $groupe
    }
    public function create()
    {
        //
    }
    
    
    public function store()
    {
        //
    }

    public function show(tag $tag)
    {
        //
    }

    public function edit(tag $tag)
    {
        //
    }

    public function update(tag $tag)
    {
        //
    }

    public function destroy(tag $tag)
    {
        //
    }
}
