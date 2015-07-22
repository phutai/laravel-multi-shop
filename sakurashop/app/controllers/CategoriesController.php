<?php
use admin\Category;
use admin\Product;

class CategoriesController extends BaseController
{

    /**
     * Category Repository
     *
     * @var Category
     */
    protected $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->category->all();

        return View::make('categories.index', compact('categories'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $category = $this->category->where('alias', '=', $id)->first();
        if ($category) {
            View::share('category', $category);
            $products = Product::where('category_id', '=', $category->id)->orderBy('created_at', 'desc')->paginate(20);

            return View::make('categories.show', compact('products'));
        }
    }

}
