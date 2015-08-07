<?php
use admin\Post;

class PostsController extends BaseController {

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
		$posts = DB::table('posts')->simplePaginate(2);

		return View::make('posts.show', compact('posts'));
	}

	/**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id)
    {
        $post = $this->post->where('alias', '=', $id)->first();
        if ($post) {
            View::share('post', $post);

            return View::make('posts.detail', compact('post'));
        }
    }
}
