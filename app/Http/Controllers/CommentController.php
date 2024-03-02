<?php

namespace App\Http\Controllers;

use App\Http\Requests\CommentRequest;
use App\Models\Article;
use App\Models\Comment;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:comment-list|comment-create|comment-edit|comment-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:comment-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:comment-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:comment-delete'], ['only' => ['destroy']]);
    }
    /**
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $comments = DB::table('comments')
            ->join('articles', 'comments.article_id','=','articles.id')
            ->join('users', 'comments.user_id','=','users.id')
            ->select('comments.value', 'comments.description', 'articles.title', 'users.full_name')
            ->where('articles.user_id','=',Auth::user()->id)
            ->orderBy('articles.id DESC')
            ->get();
        return view('admin.comments.index',compact('comments'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CommentRequest $request)
    {   //True or false = exists()
        $result= Comment::where([
            ['user_id',Auth::user()->id],
            ['articles.id',$request->article_id]
            ])->exists();
        ;
        $article =Article::select('status','slug')
                    ->find($request->article_id);
        if(!$result and $article->status == 1){
            Comment::create([
                'value' => $request->value,
                'description' => $request->description,
                'article_id' => $article,
                'user_id' => Auth::user()->id,
            ]);
            return redirect()->action([ArticleController::class,'show'],[$article->slug])
            ->with('success-create','comment created');

        } else {
            return redirect()->action([ArticleController::class,'show'],[$article->slug])
            ->with('error-create','Just one comment by article');

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Comment $comment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Comment $comment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Comment $comment)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Comment $comment)
    {
        $comment->delete();
        return redirect()->action([CommentController::class,'index'])
                ->with('success-delete','comment deleted');
}
}
