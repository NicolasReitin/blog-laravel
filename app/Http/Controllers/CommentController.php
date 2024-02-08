<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;

class CommentController extends Controller
{
    public function index()
    {
        //
    }
    public function create()
    {
        
    }
    
    
    public function store(StoreCommentRequest $request)
    {
        $props['content'] = $request->content;
        $props['created_at'] = now();
        $props['user_id'] = Auth::user()->id;
        $props['article_id'] = $request->article_id;
        $article = $request->article_id;
        // dd($article);

        dd($props);
        DB::beginTransaction();
        
        try{
            Comment::create($props);
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('article.show', compact('article'))); // et redirige ver la page show
        }
        DB::commit(); //enregistrement de l'opération
        return redirect(route('article.show', compact('article')));  //renvoi vers la page show
    }

    public function show(comment $comment)
    {
        //
    }

    public function edit(comment $comment)
    {
        //
    }

    public function update(comment $comment)
    {
        //
    }

    public function destroy(comment $comment)
    {
        //
    }
}
