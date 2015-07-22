<?php
namespace admin;
class Productoption extends \Eloquent {
	protected $guarded = array();

	public static $rules = array();


	public static function prepareUpdate($product_id){
		$option_value = Productoption::where('product_id', '=', $product_id)->delete();
		return $option_value;
	}
}
