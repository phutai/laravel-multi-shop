<?php
namespace admin;

class Store extends \Eloquent
{
    protected $guarded = array();

    public static $rules = array(
        'domain' => 'required|unique:stores,domain,:id',
        'store_name' => 'required',
        'owner_name' => 'required',
        'period' => 'required|numeric'
    );

    public static function rules($id = 0, $merge = [])
    {
        return array_merge(
            [
                'domain' => 'required|url|unique:stores,domain' . ($id ? ",$id" : ''),
                'store_name' => 'required',
                'owner_name' => 'required',
                'period' => 'required|numeric'
            ],
            $merge);
    }
    public function shopinfo()
    {
        return $this->hasOne('admin\Shopinfo');
    }
}
