<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $articles = Article::where('status', '1')
        ->orderBy('id', 'desc')
        ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        //->get();
        $navbar = Category::where([['status', '1'], ['is_featured', '1']])
        ->paginate(env('APP_RECORDS_BY_PAGE'));

        return view('home.index', compact('articles', 'navbar'));
    }

    public function main() //testing Bento grid view
    {
        return view('home.main');
    }

    public function all(){
        $categories = Category::where('status', '1')
        ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        $navbar = Category::where([['status', '1'], ['is_featured', '1'],])
        ->paginate(env('APP_RECORDS_BY_PAGE'));
        return view('home.all-categories', compact('categories', 'navbar'));
    }
}
