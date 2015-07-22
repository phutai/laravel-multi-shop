<?php
namespace admin;

class Shopinfo extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'store_id' => 'required',
		'store_name' => 'required',
		'store_address' => 'required',
		'store_baner' => 'required',
		'store_tel' => 'required',
		'store_payment' => 'required',
		'store_body' => 'required'
	);

 public static function rules($id = 0, $merge = [])
    {
        return array_merge(
            [
                'store_id' => 'unique:shopinfos,store_id' . ($id ? ",$id" : ''),
				'store_name' => 'required',
				'store_address' => 'required',
				'store_baner' => ($id ? '' : 'required'),
				'store_tel' => 'required',
				'store_payment' => 'required',
				'store_body' => 'required'
            ],
            $merge);
    }

	public function store() {
		return $this->belongsTo('admin\Store');
	}

}
