<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CategoryRequest;
use Illuminate\Support\Facades\Log;

class CategoryController extends Controller
{
    public function __construct() {
        $this->middleware('can:categories.index')->only('index');
        $this->middleware('can:categories.create')->only('create','store');
        $this->middleware('can:categories.edit')->only('edit','update');
        $this->middleware('can:categories.destroy')->only('destroy');
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id', 'desc')
        ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        return view('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategoryRequest $request)
    {
        //Log::info('Storing category');
        $category = $request->all();
        //Log::info($category);

        try {
            if($request->hasFile('image')){
                $category['image'] = $request->file('image')->store('categories');
            }
            $category= Category::create($category);
        } catch (\Exception $e) {
            return response()->json([
                'error' => $e->getMessage(),
                'code' => $e->getCode(),
            ], 403);
        }
        return redirect()->action([CategoryController::class, 'index'],['success_message' => 'category created successfully']);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategoryRequest $request, Category $category)
    {
        //update image folder
        if($request->hasFile('image')){
            File::delete(public_path('storage/' . $category->image)); //categories/
            $category['image'] = $request->file('image')->store('categories');
        }
        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
        ]);
        return redirect()->action([CategoryController::class, 'index'])->with('success_message', 'category updated successfully');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        if($category->image){
            File::delete(public_path('storage/' . $category['image'])); //categories/
        }
        $category->delete();
        return redirect()->action([CategoryController::class, 'index'])->with('success_message', 'category deleted successfully');
    }

    public function articlesByCategory(Category $category){
        $this->authorize('published', $category);
        $articles = Article::where([['category_id',$category->id],['status', '1']])
        ->orderBy('id', 'desc')
        ->simplePaginate(env('APP_RECORDS_BY_PAGE'));
        $navbar = Category::where([['status', '1'], ['is_featured', '1']])
                    ->paginate(env('APP_RECORDS_BY_PAGE'));
        return view('subscriber.categories.detail', compact('category', 'articles', 'navbar'));
    }
}
