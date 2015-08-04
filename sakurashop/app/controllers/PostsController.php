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
		$posts = $this->post->all();

		return View::make('posts.show', compact('posts'));
	}
}
