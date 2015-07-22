<?php
namespace admin;
class Option extends \Eloquent {
	protected $guarded = array();

	public static $rules = array();
	public function value() {
		return $this->hasMany('admin\Optionvalue');
	}
}
