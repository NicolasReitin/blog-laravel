<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreCommentRequest;
use App\Http\Requests\UpdateArticleRequest;

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
        
        DB::beginTransaction();
        
        try{
            Comment::create($props);
            // dd($props);
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
        return view('comment.edit', compact('comment'));
    }

    public function update(UpdateArticleRequest $request, comment $comment)
    {
        $comment->content = $request->get('content');
        $comment->updated_at = now();
        
        DB::beginTransaction();
        try{
            $comment->save();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('article.show', $comment->article_id)); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect(route('article.show', $comment->article_id));  //renvoi vers la page index
    }

    public function destroy(comment $comment)
    {
        //
    }
}
