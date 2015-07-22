<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;

class StoresController extends \admin\BaseController
{

    /**
     * Store Repository
     *
     * @var Store
     */
    protected $store;

    public function __construct(Store $store)
    {
        $this->store = $store;
    }

    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        return View::make('admin.stores.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create()
    {
        return View::make('admin.stores.create');
    }

    public function postResults()
    {
        $posts = Store::select(array('stores.id', 'stores.id', 'stores.domain', 'stores.store_name', 'stores.owner_name', 'stores.created_at', 'stores.period'));


        return \Bllim\Datatables\Facade\Datatables::of($posts)
            ->add_column('operations', '
                    {{ Form::open(array("style" => "display: inline-block;", "method" => "DELETE", "route" => array("admin.stores.destroy", $id))) }}
{{ Form::submit("Delete", array("class" => "btn btn-danger")) }}
{{ Form::close() }}
{{ link_to_route("admin.stores.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
                ')
            ->edit_column('id', function ($row) {
                return "<input type=\"checkbox\" name=\"id[]\" value=\"{$row->id}\">";
            })
            ->make();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store()
    {
        $input = Input::all();
        $validation = Validator::make($input, Store::$rules);

        if ($validation->passes()) {
            $this->store->create($input);

            return Redirect::route('admin.stores.index');
        }

        return Redirect::route('admin.stores.create')
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
        $store = $this->store->findOrFail($id);

        return View::make('admin.stores.show', compact('store'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id)
    {
        $store = $this->store->find($id);

        if (is_null($store)) {
            return Redirect::route('admin.stores.index');
        }

        return View::make('admin.stores.edit', compact('store'));
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
        $validation = Validator::make($input, Store::rules($id));

        if ($validation->passes()) {
            $store = $this->store->find($id);
            $store->update($input);

            return Redirect::route('admin.stores.index');
        }

        return Redirect::route('admin.stores.edit', $id)
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
        $this->store->find($id)->delete();

        return Redirect::route('admin.stores.index');
    }

}
