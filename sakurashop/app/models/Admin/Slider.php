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

	public static function loadSlidersTop() {
		$sliders = DB::table('sliders')
                     ->select(DB::raw('id'))
                     ->where('positison', '=', 'top')
                     ->first();
		return $sliders->id;
	}
}
