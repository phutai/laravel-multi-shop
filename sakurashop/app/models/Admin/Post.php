<?php
namespace admin;

class Post extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'alias' => 'required|unique',
		'meta-title' => 'required',
		'meta-description' => 'required',
		'status' => 'required'
	);

	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
			[
				'title' => 'required|unique:posts,title' . ($id ? ",$id" : ''),
				'alias' => 'required|unique:posts,alias' . ($id ? ",$id" : ''),
			],
			$merge);
	}
}
