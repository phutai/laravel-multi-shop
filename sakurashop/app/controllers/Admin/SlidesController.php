<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class SlidesController extends \admin\BaseController {

	/**
	 * Slide Repository
	 *
	 * @var Slide
	 */
	protected $slide;

	public function __construct(Slide $slide)
	{
		$this->slide = $slide;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$slides = $this->slide->all();

		return View::make('admin.slides.index', compact('slides'));
	}

	/**
     * @return mixed
     */
    public function results() {
        
        $posts = Slide::select('slides.id', 'slides.sliders_id', 'slides.title', 'slides.description', 'slides.image', 'slides.link', 'slides.status');
        
        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '
{{ link_to_route("admin.slides.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
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
		return View::make('admin.slides.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Slide::$rules);

		if ($validation->passes())
		{
			$this->slide->create($input);

			return Redirect::route('admin.slides.index');
		}

		return Redirect::route('admin.slides.create')
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
		$slide = $this->slide->findOrFail($id);

		return View::make('admin.slides.show', compact('slide'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$slide = $this->slide->find($id);

		if (is_null($slide))
		{
			return Redirect::route('admin.slides.index');
		}

		return View::make('admin.slides.edit', compact('slide'));
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
		$validation = Validator::make($input, Slide::$rules);

		if ($validation->passes())
		{
			$slide = $this->slide->find($id);
			$slide->update($input);

			return Redirect::route('admin.slides.show', $id);
		}

		return Redirect::route('admin.slides.edit', $id)
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
		$this->slide->find($id)->delete();

		return Redirect::route('admin.slides.index');
	}

}
