<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;

use \Config;
class OptionvaluesController extends \admin\BaseController {

	/**
	 * Optionvalue Repository
	 *
	 * @var Optionvalue
	 */
	protected $optionvalue;

	public function __construct(Optionvalue $optionvalue)
	{
		$this->optionvalue = $optionvalue;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$optionvalues = $this->optionvalue->all();

		return View::make('admin.optionvalues.index', compact('optionvalues'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.optionvalues.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Optionvalue::$rules);

		if ($validation->passes())
		{
			$this->optionvalue->create($input);

			return Redirect::route('admin.optionvalues.index');
		}

		return Redirect::route('admin.optionvalues.create')
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
		$optionvalue = $this->optionvalue->findOrFail($id);

		return View::make('admin.optionvalues.show', compact('optionvalue'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$optionvalue = $this->optionvalue->find($id);

		if (is_null($optionvalue))
		{
			return Redirect::route('admin.optionvalues.index');
		}

		return View::make('admin.optionvalues.edit', compact('optionvalue'));
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
		$validation = Validator::make($input, Optionvalue::$rules);

		if ($validation->passes())
		{
			$optionvalue = $this->optionvalue->find($id);
			$optionvalue->update($input);

			return Redirect::route('admin.optionvalues.show', $id);
		}

		return Redirect::route('admin.optionvalues.edit', $id)
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
		$this->optionvalue->find($id)->delete();

		return Redirect::route('admin.optionvalues.index');
	}

}
