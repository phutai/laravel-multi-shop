<?php
use admin\Product;
use admin\Option;

class ProductsController extends BaseController
{

    /**
     * Product Repository
     *
     * @var Product
     */
    protected $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $products = $this->product->all();
        $randomProducts = $this->product->orderByRaw('RAND()')->take(12)->get();
        $bestSelling = DB::select(DB::raw('SELECT p.*, sum(po.quantity) qty
                            FROM products p
                            LEFT OUTER JOIN orderproducts po ON po.product_id = p.id
                            LEFT OUTER JOIN orders        o  ON o.id          = po.order_id
                            WHERE o.status != 0
                            GROUP BY po.product_id
                            ORDER BY qty DESC, p.created_at
                            LIMIT 12
                            '));
        View::share('randomProducts', $randomProducts);
        View::share('sellingProducts', $bestSelling);
        return View::make('products.index', compact('products'));
    }


    /**
     * @param $alias
     * @return mixed
     */
    public function show($alias)
    {
        $product = Product::with('Category')->where('alias', 'like', $alias)->first();
        View::share('category', $product->category);
        View::share('title', $product->meta_title);
        View::share('keywords', $product->meta_keywords);
        View::share('description', $product->meta_description);
        $options = Option::all()->toArray();

        foreach ($options as $key => $value) {
            $option = CommonHelper::get_option($product->id, $value['id']);
            if (empty($option)) {
                unset($options[$key]);
                continue;
            }
            $options[$key]['option'] = $option;
        }
        if (!empty($options)) View::share('options', $options);
        return View::make('products.show', compact('product'));
    }
}
