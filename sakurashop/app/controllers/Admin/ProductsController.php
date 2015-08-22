<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \CommonHelper;
use \Config;
use \DB;
class ProductsController extends \admin\BaseController
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
        return View::make('admin.products.index', compact('products'));
    }

    public function loadProducts()
    {
        if (Input::has('delete')) {
            $ids = Input::get('id');
            
            foreach ($ids as $id) {
                $this->product->find($id)->delete();
            }
        }

        $posts = Product::select(array('products.id', 'products.id', 'products.image', 'products.model', 'products.name', 'products.special_price', 'products.sale_price', 'products.manufacturer_id', 'products.created_at'));


        return \Bllim\Datatables\Facade\Datatables::of($posts)
            ->add_column('operations', '
{{ link_to_route("admin.products.edit", Lang::get("common.edit"), array($id), array("class" => "btn btn-info")) }}
                ')
            ->edit_column('id', function ($row) {
                return "<input type=\"checkbox\" name=\"id[]\" value=\"{$row->id}\">";
            })
            ->edit_column('image', function ($row) {
                return "<img src=\"/images/cache/" . Config::get('configs.thumb_image') . "/" . $row->image . "\" style=\"border: 1px solid #DDDDDD; width: 100px; height:137px;\">";
            })            
            ->filter_column('name', 'where', 'products.name', 'like', '%$1%')
            ->make();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        $options = Option::with('value')->get();

        View::share('options', $options->toArray());
        return View::make('admin.products.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $options = array();
        if(!empty($input['option'])){
            $options = $input['option'];
            $input = array_except(Input::all(), 'option');
        }
        if (!empty($input['name'])){
            $name = $input['name'];
            $input['alias'] = CommonHelper::url_slug($name);
            $input['meta_title'] = CommonHelper::url_slug($name, array(
                'delimiter' => ' ',
            ));
            $input['meta_keywords'] = CommonHelper::url_slug($name, array(
                'delimiter' => ',',
            ));
            $input['meta_description'] = CommonHelper::url_slug($name, array(
                'delimiter' => ' ',
            ));

        }
        $validation = Validator::make($input, Product::rules());

        if ($validation->passes()) {
            $input['status'] = 1;
            $input['image'] = 'default.jpg';
            $input['large_image'] = 'default.jpg';
            //Start create image
            try {
                $file = Input::file('image');
                $large_image = Input::file('large_image');
                $destinationPath = 'images';
                // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                //$filename = str_random(12);
                $filename = $file->getClientOriginalName();
                $large_image_name = $large_image->getClientOriginalName();
                //$extension =$file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $filename);
                $upload_large_image_success = $large_image->move($destinationPath, $large_image_name);
                if ($upload_success && $upload_large_image_success) {
                    $input['image'] = $filename;
                    $input['large_image'] = $large_image_name;
                }
            } catch (\Exception $ex) {
                return Redirect::route('admin.products.create')
                    ->withInput()
                    ->with('message', 'There were image errors.');
            }
            //End create image
           $product_new = $this->product->create($input);
            /**
             * Create option product value
             */
            if($product_new && !empty($options)){
                $product_option = new Productoption();
                foreach($options as $opt){
                    $array_option = array();
                    $array_option['product_id'] = $product_new->id;
                    $array_option['optionvalue_id'] = $opt;
                    $product_option->create($array_option);
                }
            }
            /**
             * End create option, redirect
             */
            return Redirect::route('admin.products.index');
        }

        return Redirect::route('admin.products.create')
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $product = $this->product->findOrFail($id);

        return View::make('admin.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $product = $this->product->with('options')->find($id);

        if (is_null($product)) {
            return Redirect::route('admin.products.index');
        }

        $options = Option::with('value')->get();
        View::share('options', $options->toArray());

        return View::make('admin.products.edit', compact('product'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id)
    {
        $input = array_except(Input::all(), '_method');
        if(!empty($input['option'])){
            $options = $input['option'];
            $input = array_except($input, 'option');
        }

        if (!empty($input['name'])){
            $name = $input['name'];
            $input['alias'] = CommonHelper::url_slug($name);
            $input['meta_title'] = CommonHelper::url_slug($name, array(
                'delimiter' => ' ',
            ));
            $input['meta_keywords'] = CommonHelper::url_slug($name, array(
                'delimiter' => ',',
            ));
            $input['meta_description'] = CommonHelper::url_slug($name, array(
                'delimiter' => ' ',
            ));
        }
        $validation = Validator::make($input, Product::rules($id));

        if ($validation->passes()) {
            $input['status'] = 1;
            try {
                $file = Input::file('image');
                $large_image = Input::file('large_image');
                if (!is_null($file) || !is_null($large_image)) {
                    $destinationPath = 'images';
                    // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                    //$filename = str_random(12);



                    if (!is_null($file)){
                        $filename = $file->getClientOriginalName();
                        $upload_success = $file->move($destinationPath, $filename);
                        if($upload_success) $input['image'] = $filename;
                    }
                    if (!is_null($large_image)) {
                        $large_image_name = $large_image->getClientOriginalName();
                        $upload_large_image_success = $large_image->move($destinationPath, $large_image_name);
                        if($upload_large_image_success)  $input['large_image'] = $large_image_name;
                    }
                }
                else{
                    $input = array_except($input, 'image');
                    $input = array_except($input, 'large_image');
                }
            } catch (\Exception $ex) {
                return Redirect::route('admin.products.edit', $id)
                    ->withInput()
                    ->with('message', 'There were image errors.');
            }
            $product = $this->product->find($id);
            $product->update($input);

            /**
             * Create option product value
             */
            if($product && !empty($options)){
                $product_option = new Productoption();
                $product_option->prepareUpdate($id);
                foreach($options as $opt){
                    $array_option = array();
                    $array_option['product_id'] = $id;
                    $array_option['optionvalue_id'] = $opt;
                    $product_option->create($array_option);
                }
            }
            /**
             * End create option, redirect
             */

            return Redirect::route('admin.products.index');
        }

        return Redirect::route('admin.products.edit', $id)
            ->withInput()
            ->withErrors($validation)
            ->with('message', 'There were validation errors.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id)
    {
        $this->product->find($id)->delete();

        return Redirect::route('admin.products.index');
    }

}
