<?php
namespace admin;

class Menu extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'id' => 'required',
		'title' => 'required',
		'alias' => 'required|unique',
		'link' => 'required',
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