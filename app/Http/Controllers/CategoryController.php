<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\File;
use App\Models\Article;
use App\Models\Category;
use App\Http\Requests\CategoryRequest;

class CategoryController extends Controller
{
    function __construct()
    {
        $this->middleware(['permission:category-list|category-create|category-edit|category-delete'], ['only' => ['index', 'show']]);
        $this->middleware(['permission:category-create'], ['only' => ['create', 'store']]);
        $this->middleware(['permission:category-edit'], ['only' => ['edit', 'update']]);
        $this->middleware(['permission:category-delete'], ['only' => ['destroy']]);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $categories = Category::orderBy('id','desc')
                        ->simplePaginate(8);
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
        $category = $request->all();
        if($request->hasFile('image')){
            $category['image'] = $request->file('image')->store('categories');
        }
        Category::create($category);
        return redirect()->action(CategoryController::class,'index')
                        ->with('success-create','category created');
    }

    /**
     * Display the specified resource.
     */
     /*
    public function show(Category $category)
    {
        //
    }
*/
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

        if($request->hasFile('image')){
            //PVR eliminar la anterior
            File::delete(public_path('storage/categories/' . $category['image']));
            //PVR crear imagen nueva
            $category['image'] = $request->file('image')->store('categories');
        }

        $category->update([
            'name' => $request->name,
            'slug' => $request->slug,
            'is_featured' => $request->is_featured,
            'status' => $request->status,
        ]);
        return redirect()->action(CategoryController::class,'index')
                        ->with('success-update','category updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //PVR eliminar la anterior
        if($category->image){
            File::delete(public_path('storage/categories/' . $category->image));
        }
        $category->delete();
        return redirect()->action(CategoryController::class,'index')
                        ->with('success-delete','category deleted');

    }
    //PVR filtra articulos por categoria
    function detail(Category $category)  {
        $articles = Article::where([
            ['category_id',$category->id],
            ['status','1'],
            ])
            ->orderBy('id DESC')
            ->simplePaginate(5);
        $navbar = Category::where([
                ['status', '=', '1'],
                ['is_featured', '=', '1']
            ])->paginate(3);
        return view('suscriber.categories.detail', compact('category','articles','navbar'));
    }
}
