<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class PromotionsController extends \admin\BaseController {

	/**
	 * Promotion Repository
	 *
	 * @var Promotion
	 */
	protected $promotion;

	public function __construct(Promotion $promotion)
	{
		$this->promotion = $promotion;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$promotion = $this->promotion->all();

		return View::make('admin.promotions.index', compact('promotions'));
	}

	/**
     * @return mixed
     */
    public function results() {
        
        $posts = Promotion::select('promotions.id', 'promotions.title', 'promotions.description', 'promotions.image', 'promotions.status');
        
        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '
{{ link_to_route("admin.promotions.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
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
		return View::make('admin.promotions.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Promotion::$rules);

		if ($validation->passes())
		{
			$this->promotion->create($input);

			return Redirect::route('admin.promotions.index');
		}

		return Redirect::route('admin.promotions.create')
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
		$promotion = $this->promotion->findOrFail($id);

		return View::make('admin.promotions.show', compact('promotion'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$promotion = $this->promotion->find($id);

		if (is_null($promotion))
		{
			return Redirect::route('admin.promotions.index');
		}

		return View::make('admin.promotions.edit', compact('promotion'));
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
		$validation = Validator::make($input, Promotion::$rules);

		if ($validation->passes())
		{
			$promotion = $this->promotion->find($id);
			$promotion->update($input);

			return Redirect::route('admin.promotions.index', $id);
		}

		return Redirect::route('admin.promotions.edit', $id)
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
		$this->promotion->find($id)->delete();

		return Redirect::route('admin.promotions.index');
	}

}
