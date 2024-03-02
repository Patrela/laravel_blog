<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    function __construct()
    {
        $this->middleware(['permission:article-list|article-create|article-edit|article-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:article-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:article-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:article-delete'], ['only' => ['destroy']]);
    }

    public function index()
    {
        $user = Auth::user();
        //$articles = Article::all();
        $articles = Article::where([
            ['user_id',$user->id]
            ])
            ->orderBy('id', 'desc')
            ->simplePaginate(10);
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //PVR enabled categories
        $categories = Category::select('id', 'name')
                        ->where('status', '=', '1')
                        ->get();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //PVR a cambio de cargas uno a uno MERGE carga masivamente la solicitud
        $request->merge([
            'user_id' => Auth::user()->id,
        ]);
        $article = $request->all();
        //revisar si hay imgen, enviarla  a la carpeta ARTICLES
        if($request->hasFile('image')) {
            $article['image'] = $request->file('image')->store('articles');
        }

        Article::create($article);
        return redirect()->action([ArticleController::class,'index'])
                        ->with('sucess-create','article created');

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        $comments = $article->comments()->simplePaginate(5);
        return view('suscriber.articles.show',compact('article','comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //PVR enabled categories
        $categories = Category::select('id', 'name')
                        ->where('status', '=', '1')
                        ->get();
            return view('admin.articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //PVR revisar si hay imagen, enviarla  a la carpeta ARTICLES
        if($request->hasFile('image')) {
            //eliminar la anterior
            File::delete(public_path('storage/articles/' . $article->image));
            //asignar nueva imagen
            $article['image'] = $request->file('image')->store('articles');
        }
        $article->update([
            'title' => $request->title,
            'slug' => $request->slug,
            'introduction' => $request->introduction,
            'body' => $request->body,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,
            'status' => $request->status,
        ]);
        return redirect()->action([ArticleController::class,'index'])
                        ->with('sucess-update','article updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        if($article) {
            $article->delete();
        }
        return redirect()->action([ArticleController::class,'index'])
                        ->with('sucess-delete','article deleted');
    }
}
