<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use App\Http\Requests\ArticleRequest;

class ArticleController extends Controller
{
    public function __construct() {
        $this->middleware('can:articles.index')->only('index');
        $this->middleware('can:articles.create')->only('create','store');
        $this->middleware('can:articles.edit')->only('edit','update');
        $this->middleware('can:articles.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource for the current user.
     */


    public function index()
    {
        $user_id = Auth::user()->id;
        //administrator can view all articles
        $users = User::select('name', 'full_name')->where('id',$user_id)->role(env('APP_ADMINISTRATOR_ROLE'))->get();
        //Log::info($users);
        $articles = Article::
                    when(count($users) == 0, function ($query) use ($user_id) {
                        $query->where('user_id', $user_id);
                    })
                    ->orderBy('id', 'desc')
                    ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        return view('admin.articles.index', compact('articles'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $categories = Category::select(['id','name'])
                            ->where('status', '1')
                            ->get();
        return view('admin.articles.create', compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(ArticleRequest $request)
    {
        // add user_id to request
        $request->merge([
            'user_id' => Auth::user()->id,
        ]);
        $article = $request->all();
        //save image file
        if($request->hasFile('image')){
            $article['image'] = $request->file('image')->store('articles');
        }
        Article::create($article);
        //execute index method
        return redirect()->action([ArticleController::class, 'index'],['success_message' => 'article created successfully']);

    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //apply policy for the slug in ArticlePolicy.published()
        $this->authorize('published', $article);
        $comments = $article->comments()->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        return view('subscriber.articles.show', compact('article', 'comments'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        $this->authorize('view', $article);
        $categories = Category::select(['id','name'])
                            ->where('status', '1')
                            ->get();
         return view('admin.articles.edit', compact('article','categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ArticleRequest $request, Article $article)
    {
        $this->authorize('update', $article);
        //update image folder
        if($request->hasFile('image')){
            File::delete(public_path('storage/' . $article->image)); //articles/
            $article['image'] = $request->file('image')->store('articles');
        }
        $article->update([
            'title' => $request->title,
            'slug' => $request->slug, //Str::slug($title),
            'introduction'=>$request->introduction,
            'body' => $request->body,
            'status' => $request->status,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category_id,

        ]);
        return redirect()->action([ArticleController::class, 'index'])->with('success_message', 'article updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //update image folder
        if($article->image){
            File::delete(public_path('storage/' . $article['image'])); // articles/
        }
        $article->delete();
        return redirect()->action([ArticleController::class, 'index'])->with('success_message', 'article deleted successfully');

    }

}
