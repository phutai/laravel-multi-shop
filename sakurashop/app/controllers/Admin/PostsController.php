<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class PostsController extends \admin\BaseController {

	/**
	 * Post Repository
	 *
	 * @var Post
	 */
	protected $post;

	public function __construct(Post $post)
	{
		$this->post = $post;
	}

	/**
	 * Display a listing of the resource.
	 *
	 * @return Response
	 */
	public function index()
	{
		$posts = $this->post->all();

		return View::make('admin.posts.index', compact('posts'));
	}

	/**
     * @return mixed
     */
    public function results() {
        
        $posts = Post::select('posts.id', 'posts.title', 'posts.description', 'posts.alias', 'posts.meta-title', 'posts.meta-description', 'posts.status');
        
        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '
{{ link_to_route("admin.posts.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
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
		return View::make('admin.posts.create');
	}

	/**
	 * Store a newly created resource in storage.
	 *
	 * @return Response
	 */
	public function store()
	{
		$input = Input::all();
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			$this->post->create($input);

			return Redirect::route('admin.posts.index');
		}

		return Redirect::route('admin.posts.create')
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
		$post = $this->post->findOrFail($id);

		return View::make('admin.posts.show', compact('post'));
	}

	/**
	 * Show the form for editing the specified resource.
	 *
	 * @param  int  $id
	 * @return Response
	 */
	public function edit($id)
	{
		$post = $this->post->find($id);

		if (is_null($post))
		{
			return Redirect::route('admin.posts.index');
		}

		return View::make('admin.posts.edit', compact('post'));
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
		$validation = Validator::make($input, Post::$rules);

		if ($validation->passes())
		{
			$post = $this->post->find($id);
			$post->update($input);

			return Redirect::route('admin.posts.show', $id);
		}

		return Redirect::route('admin.posts.edit', $id)
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
		$this->post->find($id)->delete();

		return Redirect::route('admin.posts.index');
	}

}
