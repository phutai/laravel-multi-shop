<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;

use \Config;

class OptionsController extends \admin\BaseController {

	/**
	 * Option Repository
	 *
	 * @var Option
	 */
	protected $option;

	public function __construct(Option $option)
	{
		$this->option = $option;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$options = $this->option->all();

		return View::make('admin.options.index', compact('options'));
	}

	/**
	 * Show the form for creating a new resource.
	 *
	 * @return Response
	 */
	public function create()
	{
		return View::make('admin.options.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Option::$rules);

		if ($validation->passes())
		{
			$this->option->create($input);

			return Redirect::route('admin.options.index');
		}

		return Redirect::route('admin.options.create')
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
		$option = $this->option->findOrFail($id);

		return View::make('admin.options.show', compact('option'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$option = $this->option->find($id);

		if (is_null($option))
		{
			return Redirect::route('admin.options.index');
		}

		return View::make('admin.options.edit', compact('option'));
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
		$validation = Validator::make($input, Option::$rules);

		if ($validation->passes())
		{
			$option = $this->option->find($id);
			$option->update($input);

			return Redirect::route('admin.options.show', $id);
		}

		return Redirect::route('admin.options.edit', $id)
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
		$this->option->find($id)->delete();

		return Redirect::route('admin.options.index');
	}

}
