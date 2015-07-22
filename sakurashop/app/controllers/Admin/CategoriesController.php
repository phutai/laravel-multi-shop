<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \CommonHelper;

class CategoriesController extends \admin\BaseController
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

        return View::make('admin.categories.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        if (!empty($input['name'])) $input['alias'] = CommonHelper::url_slug($input['name']);
        $validation = Validator::make($input, Category::rules());
        if ($validation->passes()) {
            $input['status'] = 1;
            $this->category->create($input);

            return Redirect::route('admin.categories.index');
        }

        return Redirect::route('admin.categories.create')
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
        $category = (is_numeric($id)) ? $this->category->findOrFail($id) : Category::with('Product')->where('alias', 'like', $id)->first();


        $products = $category->product;

        return View::make('admin.categories.show', compact('category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $category = $this->category->find($id);

        if (is_null($category)) {
            return Redirect::route('admin.categories.index');
        }

        return View::make('admin.categories.edit', compact('category'));
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
        if (!empty($input['name'])) $input['alias'] = CommonHelper::url_slug($input['name']);
        $validation = Validator::make($input, Category::rules($id));
        if ($validation->passes()) {
            $category = $this->category->find($id);
            $category->update($input);

            return Redirect::route('admin.categories.show', $id);
        }

        return Redirect::route('admin.categories.edit', $id)
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
        $this->category->find($id)->delete();

        return Redirect::route('admin.categories.index');
    }

}
