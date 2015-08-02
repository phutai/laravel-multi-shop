<?php

class Post extends Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'alias' => 'required',
		'meta-title' => 'required',
		'meta-description' => 'required',
		'status' => 'required'
	);
}
