<?php
namespace admin;

class Slider extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'positison' => 'required',
		'type' => 'required',
		'status' => 'required'
	);
}
