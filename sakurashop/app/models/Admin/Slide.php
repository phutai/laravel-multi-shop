<?php
namespace admin;

class Slide extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'sliders_id' => 'required',
		'title' => 'required',
		'description' => 'required',
		'image' => 'required',
		'link' => 'required',
		'status' => 'required'
	);

	public static function loadSlides(){
		$slides = new Slide();
		return $slides->all();
	}
}
