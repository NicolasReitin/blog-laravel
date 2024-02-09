<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreArticleRequest;
use App\Http\Requests\UpdateArticleRequest;

class ArticleController extends Controller
{
    public function index()
    {        
        $articles = Article::where('is_approved', 1)->orderBy('created_at', 'DESC')->get();

        return view('article.index', ['articles' => $articles]); //renvoi vers la page index avec tous les articles récupérés de la bdd dans la function $groupe
    }

    public function validated()
    {
        $articlessNotValidates = Article::where('is_approved', 0)->get();
        return view('article.validate', compact('articlessNotValidates'));
    }

    public function approved(article $article)
    {
        $article->is_approved = 1; 

        DB::beginTransaction();
        try{
            // dd($article);
            $article->save();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect(route('articles.validate')); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect(route('articles.validate'));  //renvoi vers la page index
    }





    public function create()
    {
        //
    }

    
    public function store(StoreArticleRequest $request)
    {
        $props = [];
        $props['title'] = $request->title;
        $props['content'] = $request->content;
        $props['media'] = $request->media;
        $props['user_id'] = Auth::user()->id;
        $props['is_approved'] = 0;
        // dd($props);
        Article::create($props);
        return redirect('articles');
    }

    public function show(article $article)
    {
        $comments = Comment::orderBy('created_at', 'DESC')->get();

        return view('article.show', compact('article', 'comments')); // renvoi vers la page show 
    }

    public function edit(article $article)
    {
        return view('article.edit', compact('article'));
    }

    public function update(UpdateArticleRequest $request, article $article)
    {
        $article->title = $request->get('title');
        $article->content = $request->get('content');
        $article->media = $request->get('media');
        $article->updated_at = now();

        DB::beginTransaction();
        try{
            // dd($article);
            $article->save();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect('article.edit'); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('articles');  //renvoi vers la page index
    }

    public function destroy(article $article)
    {
        DB::beginTransaction();
        try{
            $article->delete();
        }
        catch(Exception $ex){ // si le try ne fonctionne pas
            DB::rollBack(); //alors ça rollback
            return redirect('articles'); // et redirige ver la page users
        }
        DB::commit(); //enregistrement de l'opération
        return redirect('articles');  //renvoi vers la page index
    }

}
