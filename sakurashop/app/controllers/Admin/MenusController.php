<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class MenusController extends \admin\BaseController {

	/**
	 * Menu Repository
	 *
	 * @var Menu
	 */
	protected $menu;

	public function __construct(Menu $menu)
	{
		$this->menu = $menu;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$menus = $this->menu->all();
		return View::make('admin.menus.index', compact('menus'));
	}

	/**
     * @return mixed
     */
    public function results() {
        
        $menus = Menu::select('menus.id', 'menus.title', 'menus.alias', 'menus.link', 'menus.category', 'menus.status', 'menus.target');
        
        return \Bllim\Datatables\Facade\Datatables::of($menus)->add_column('operations', '
{{ link_to_route("admin.menus.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
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
		return View::make('admin.menus.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();

		if (!empty($input['title'])) $input['alias'] = CommonHelper::url_slug($input['title']);
		$validation = Validator::make($input, Menu::$rules);

		if ($validation->passes())
		{
			$this->menu->create($input);

			return Redirect::route('admin.menus.index');
		}

		return Redirect::route('admin.menus.create')
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
		$menu = $this->menu->findOrFail($id);

		return View::make('admin.menus.show', compact('menu'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$menu = $this->menu->find($id);

		if (is_null($menu))
		{
			return Redirect::route('admin.menus.index');
		}

		return View::make('admin.menus.edit', compact('menu'));
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
		$validation = Validator::make($input, Menu::$rules);

		if ($validation->passes())
		{
			$menu = $this->menu->find($id);
			$menu->update($input);

			return Redirect::route('admin.menus.show', $id);
		}

		return Redirect::route('admin.menus.edit', $id)
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
		$this->menu->find($id)->delete();

		return Redirect::route('admin.menus.index');
	}

}
