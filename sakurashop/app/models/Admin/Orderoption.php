<?php
namespace admin;
class Orderoption extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'order_id' => 'required',
		'orderproduct_id' => 'required',
		'option_id' => 'required',
		'optionvalue_id' => 'required',
		'name' => 'required'
	);
}
