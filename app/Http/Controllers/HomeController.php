<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //$articles = Article::all();
        $articles = Article::where('status', '=', '1')
                                ->orderBy('id', 'desc')
                                ->simplePaginate(10);
        $navbar = Category::where([
                                ['status', '=', '1'],
                                ['is_featured', '=', '1']
                            ])->paginate(3);

        return view('home.index', compact('articles','navbar')); // equivale a ->with('articles' ->$articles)
    }
    public function all()
    {
        $categories = Category::where('status', '=', '1')
                                ->simplePaginate(20);
        $navbar = Category::where([
                                    ['status', '=', '1'],
                                    ['is_featured', '=', '1']
                                ])->paginate(3);
        return view('category.index', compact('categories','navbar'));
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
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Article $article)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Article $article)
    {
        //
    }
}
