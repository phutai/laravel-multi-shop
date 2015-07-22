<?php
namespace admin;
class Optionvalue extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required|unique:optionvalues,name'
	);
	public function option()
	{
		return $this->belongsTo('admin\Option');
	}
	public function product_option(){
		return $this->hasMany('admin\Productoption');
	}
}
