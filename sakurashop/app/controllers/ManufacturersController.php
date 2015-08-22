<?php
use admin\Category;
use admin\Product;

class ManufacturersController extends BaseController
{

    /**
     * Manufacturer Repository
     *
     * @var Manufacturer
     */
    protected $manufacturer;

    public function __construct(Manufacturer $manufacturer)
    {
        $this->manufacturer = $manufacturer;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        $categories = $this->manufacturer->all();

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
        $products = Product::where('manufacturer_id', '=', $id)->orderBy('created_at', 'desc')->paginate(20);

        return View::make('categories.show', compact('products'));
    }
}
