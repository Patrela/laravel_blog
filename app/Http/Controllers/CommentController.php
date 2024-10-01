<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\CommentRequest;
use Ramsey\Uuid\Type\Integer;

class CommentController extends Controller
{
    public function __construct() {
        $this->middleware('can:comments.index')->only('index');
       // $this->middleware('can:comments.create')->only('store');
        $this->middleware('can:comments.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*
        $comments = Comment::join('articles', 'comments.article_id', '=', 'articles.id')
        ->join('users', 'comments.user_id', '=','users.id' )
        ->select('comments.value', 'comments.description', 'articles.title', 'users.full_name')
        ->where('articles.user_id', Auth::user()->id)
        ->orderBy('articles.id', 'desc')
        ->get(); //->toSql();
        //Log::info(Auth::user()->id);
        //Log::info($comments);
*/
        $comments = Comment::join('articles', function($join) {
            $join->on('comments.article_id', '=', 'articles.id')
                 ->where('articles.user_id', '=', Auth::id());
        })
        ->join('users', 'comments.user_id', '=', 'users.id')
        ->select('comments.id','comments.value', 'comments.description', 'articles.title', 'users.full_name')
        ->orderBy('articles.id', 'desc')
        ->get();

        return view('admin.comments.index', compact('comments'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {
        $exists = Comment::where([['user_id', Auth::user()->id],['article_id', $request->article_id]])
                ->exists();
        $article = Article::select('status', 'slug')->find($request->article_id);
        //Log::info("Comment",[$exists, "Auth ", Auth::user()->id,  "article id=", $request->article_id, " slug ", $article->slug, " ", $article->status] );
        if(!$exists && $article->status == 1){
            Comment::create([
            'value' =>$request->value,
            'description' =>$request->description,
            'user_id' => Auth::user()->id,
            'article_id' => $request->article_id,
            ]);
            //return redirect()->action([ArticleController::class, 'show'],[$article->slug]);
            return redirect()->action([ArticleController::class, 'show'],[$article]);
        }
        else {
            return redirect()->action([ArticleController::class, 'show'],[$article])->with('success-error', 'Just comment once');
            //return redirect()->action([ArticleController::class, 'show'],[$article ->slug])->with('success-error', 'Just comment once');
        }

    }

    /**
     * Remove the specified resource in storage.
     */
    public function destroy(int $comment)
    {
        $comment= Comment::find($comment);
        $comment->delete();
        return redirect()->action([CommentController::class, 'index'],compact('comment'))
            ->with('success_message', 'Comment deleted successfully');
    }

}
