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

    public function showImportPage() 
    {
        return View::make('categories.importData');
    }

    public function importData()
    {
        // check execute sql success or false
        $isSuccess = false;

        // get path file in page
        $pathFile = Input::get('pathFile');
        
        // get file from path
        $json_file = file_get_contents($pathFile);

        $jfo = json_decode($json_file);

        $results = $jfo;
        // analyze array data to each product
        foreach (($results->posts) as $key => $result) {
            $temp = explode('~^~',$result->FIELD1);

            // get category in database
            $categoriesData = DB::table('categories')->select('name')->get();
            
            // is product's category exist in database? flag
            $existCategory = 0;

            $productName = '';
            $productPrice = 0.0;
            $productCategory = 0;
            $productDescription = '';
            $productImage = '';
            $productLargeImage = '';

            if (count($temp) > 0) {
                // analyze each product to properties
                foreach ($temp as $key => $value) {
                    if ($key == 2) {
                        // split all categories of product
                        $categories = explode('/', $value);
                        // loop all categories in product
                        foreach ($categories as $key => $category) {
                            if (count($categoriesData) > 0) {
                                // loop all categories in database
                                foreach ($categoriesData as $key => $categoryData) {
                                    // already have this category in database
                                    if ($categoryData->name == $category) {
                                        $existCategory = 1;
                                        break;
                                    }
                                }
                            }
                            // don't have this category in database -> add category to table categories
                            if ($existCategory == 0) {
                                DB::table('categories')->insert(
                                    array('name'=> $category)
                                );
                            }
                            $existCategory = 0;
                            // get id of category
                            $productCategory = DB::table('categories')
                                                ->select('id')
                                                ->where('name', $category)
                                                ->first()
                                                ->id;
                        }
                    }
                    // get product name of category
                    if ($key == 3) {
                        $productName = $value;
                    }
                    // get product description of category
                    if ($key == 5) {
                        $productDescription = $value;
                    }
                    // get product price of category
                    if ($key == 6) {
                        $productPrice = $value;
                    }
                    // get product large image of category
                    if ($key == 7) {
                        $productLargeImage = $value;
                    }
                    // get product image of category
                    if ($key == 8) {
                        $productImage = $value;
                    }
                }
                // insert product to database
                $isSuccess = DB::table('products')->insert(
                    array('name'=> $productName, 'sale_price' => $productPrice, 'special_price' => $productPrice
                        , 'image' => $productImage, 'large_image' => $productLargeImage
                        , 'description' => $productDescription, 'category_id' => $productCategory)
                );
            }
        }

        if ($isSuccess)
            printf('success');
        else
            printf('false');
    }

}
