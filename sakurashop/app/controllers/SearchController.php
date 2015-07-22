<?php
use admin\Category;
use admin\Product;

class SearchController extends BaseController
{
	 /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function search($q)
    {
            $keyword = '%' . $q . '%';

            $products = Product::where('name', 'like', $keyword)->orWhere('model', 'like', $keyword)->paginate(20);

            return View::make('categories.show', compact('products'));
    }
}