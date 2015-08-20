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

Route::get('/', 'ProductsController@index');
Route::get('/search/{q}', ['uses' =>'SearchController@search']);
Route::get('/gioi-thieu', ['uses' =>'PagesController@about']);
Route::get('/tin-tuc', 'PostsController@index');
Route::get('/importPage', 'CategoriesController@showImportPage');
Route::get('/fixImageName', 'CategoriesController@correctNameImage');
Route::post('importData', 'CategoriesController@importData');
Route::group(array('prefix' => 'admin', 'before'=>'admin'), function () {

    

    Route::resource('stores', 'admin\StoresController');
    Route::post('/stores/loadStores', 'admin\StoresController@postResults');
    Route::post('/shopinfos/loadShops', 'admin\ShopinfosController@results');
    Route::post('/products/loadProducts', 'admin\ProductsController@loadProducts');
    Route::resource('shopinfos', 'admin\ShopinfosController');
    Route::resource('categories', 'admin\CategoriesController');
    Route::resource('products', 'admin\ProductsController');
    Route::resource('options', 'admin\OptionsController');
    Route::resource('optionvalues', 'admin\OptionvaluesController');
    Route::resource('orderproducts', 'admin\OrderproductsController');
    Route::resource('sliders', 'admin\SlidersController');
    Route::resource('slides', 'admin\SlidesController');
    Route::resource('posts', 'admin\PostsController');
    Route::resource('menus', 'admin\MenusController');
    Route::resource('promotions', 'admin\PromotionsController');
    Route::post('/sliders/loadSliders', 'admin\SlidersController@results');
    Route::post('/slides/loadSlides', 'admin\SlidesController@results');
    Route::post('/posts/loadPosts', 'admin\PostsController@results');
    Route::post('/menus/loadMenus', 'admin\MenusController@results');
    Route::post('/promotions/loadPromotions', 'admin\PromotionsController@results');
});

Route::group(array('prefix' => 'admin', 'before'=>'baseadmin'), function () {
    
    Route::get('/', 'admin\OrdersController@index');
    Route::post('/orders/loadOrders', 'admin\OrdersController@loadOrders');
    Route::resource('orders', 'admin\OrdersController');
   
    Route::post('/sendMail', array('as' => 'sendMail', 
    'uses' => 'admin\OrdersController@sendMail'));
    Route::get('/createMail', 'admin\OrdersController@createMail');
});

Route::group(['prefix' => 'cart'], function () {
    Route::get('/addAjax', 'OrdersController@addAjax');
    Route::post('/remove', 'OrdersController@removeItem');
    Route::get('/removeAjax', 'OrdersController@deleteAjax');
    Route::get('/destroy', 'OrdersController@destroy');
    Route::get('/view', 'OrdersController@viewCart');
    Route::get('/view', 'OrdersController@viewCart');

});
Route::group(['prefix' => 'tai-khoan', 'before'=>'guest'], function () {
    Route::get('/lich-su-don-hang', 'OrdersController@orderHistory');
    Route::get('/chi-tiet-don-hang/{id}', 'OrdersController@detail');
});
Route::resource('orders', 'OrdersController');
Route::get('/danh-muc/{alias?}', array('uses' => 'CategoriesController@show'))->where('alias', '.*');
//Route::get('/tim-kiem/{alias?}', array('uses' => 'SearchController@search'))->where('alias', '.*');
Route::get('/san-pham/{alias?}', array('uses' => 'ProductsController@show'))->where('alias', '.*');
Route::get('/posts/{alias?}', array('uses' => 'PostsController@show'))->where('alias', '.*');


