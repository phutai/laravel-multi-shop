<?php
namespace admin;
class Order extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'fullname' => 'required',
		'phone' => 'required',
		'address' => 'required',
	);
	public function order_detail() {
		return $this->hasMany('admin\Orderproduct');
	}

}
