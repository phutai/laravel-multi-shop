<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class ManufacturersController extends \admin\BaseController {

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
		$manufacturer = $this->manufacturer->all();

		return View::make('admin.manufacturers.index', compact('manufacturers'));
	}

	/**
     * @return mixed
     */
    public function results() {
        
        $posts = Manufacturer::select('manufacturers.id', 'manufacturers.title', 'manufacturers.description', 'manufacturers.image', 'manufacturers.status');
        
        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '
{{ link_to_route("admin.manufacturers.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
                ')->edit_column('id', function ($row) {
            return "<input type=\"checkbox\" name=\"id[]\" value=\"{$row->id}\">";
        })->make();
    }

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.manufacturers.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Manufacturer::$rules);

		if ($validation->passes())
		{
			$this->manufacturer->create($input);

			return Redirect::route('admin.manufacturers.index');
		}

		return Redirect::route('admin.manufacturers.create')
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Display the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function show($id)
	{
		$manufacturer = $this->manufacturer->findOrFail($id);

		return View::make('admin.manufacturers.show', compact('manufacturer'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$manufacturer = $this->manufacturer->find($id);

		if (is_null($manufacturer))
		{
			return Redirect::route('admin.manufacturers.index');
		}

		return View::make('admin.manufacturers.edit', compact('manufacturer'));
	}

	/**
	 * Update the specified resource in storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function update($id)
	{
		$input = array_except(Input::all(), '_method');
		$validation = Validator::make($input, Manufacturer::$rules);

		if ($validation->passes())
		{
			$manufacturer = $this->manufacturer->find($id);
			$manufacturer->update($input);

			return Redirect::route('admin.manufacturers.index', $id);
		}

		return Redirect::route('admin.manufacturers.edit', $id)
			->withInput()
			->withErrors($validation)
			->with('message', 'There were validation errors.');
	}

	/**
	 * Remove the specified resource from storage.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function destroy($id)
	{
		$this->manufacturer->find($id)->delete();

		return Redirect::route('admin.manufacturers.index');
	}

}
