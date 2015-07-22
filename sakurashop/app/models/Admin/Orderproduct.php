<?php
namespace admin;
class Orderproduct extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'order_id' => 'required',
		'product_id' => 'required',
		'name' => 'required',
		'quantity' => 'required',
		'price' => 'required',
		'total' => 'required'
	);
	public function order()
	{
		return $this->belongsTo('admin\Order');
	}
}
