<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', function() {
	return View::make('hello');
});

Route::get('/tmp', function() {
	$json_file = file_get_contents('C:\Users\Eraoni\Downloads\example.json');

	$jfo = json_decode($json_file);

	$results = $jfo;

	foreach ($results as $key => $result) {
		$temp = explode('~^~',$result->FIELD1);

		$categoriesData = DB::table('categories')->select('name')->get();
		
		$existCategory = 0;

		$productName = '';
		$productPrice = 0.0;
		$productCategory = 0;
		$productDescription = '';
		$productImage = '';
		$productLargeImage = '';

		if (count($temp) > 0) {
			foreach ($temp as $key => $value) {
				if ($key == 2) {
					$categories = explode('/', $value);
					foreach ($categories as $key => $category) {
						if (count($categoriesData) > 0) {
							foreach ($categoriesData as $key => $categoryData) {
								if ($categoryData->name == $category) {
									$existCategory = 1;
									break;
								}
							}
						}
						if ($existCategory == 0) {
							DB::table('categories')->insert(
								array('name'=> $category)
							);
						}
						$existCategory = 0;
					}
					$productCategory = DB::table('categories')->select('id')->where('name', $category)->get();
					$productCategory = $productCategory[0]->id;
				}
				if ($key == 3) {
					$productName = $value;
				}

				if ($key == 5) {
					$productDescription = $value;
				}

				if ($key == 6) {
					$productPrice = $value;
				}

				if ($key == 7) {
					$productLargeImage = $value;
				}

				if ($key == 8) {
					$productImage = $value;
				}
			}
			DB::table('products')->insert(
				array('name'=> $productName, 'sale_price' => $productPrice, 'special_price' => $productPrice
					, 'image' => $productImage, 'large_image' => $productLargeImage
					, 'description' => $productDescription, 'category_id' => $productCategory)
			);
		}
	}

	
});
