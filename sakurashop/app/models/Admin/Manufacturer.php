<?php
namespace admin;

class Manufacturer extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'title' => 'required',
		'description' => 'required',
		'image' => 'required',
		'status' => 'required'
	);
}
