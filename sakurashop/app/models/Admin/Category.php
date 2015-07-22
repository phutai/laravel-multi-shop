<?php
namespace admin;
class Category extends \Eloquent {
	protected $guarded = array();

	public static $rules = array(
		'name' => 'required',
		'parent_id' => 'required',
		'description' => 'required',
		'meta_description' => 'required',
		'meta_keyword' => 'required',
		'sort_order' => 'required',
		'alias' => 'required|unique'
	);
	public static function rules($id = 0, $merge = [])
	{
		return array_merge(
			[
				'name' => 'required|unique:categories,name' . ($id ? ",$id" : ''),
				'alias' => 'required|unique:categories,alias' . ($id ? ",$id" : ''),
			],
			$merge);
	}
	public static function loadCategories(){
		$category = new Category();
		return $category->all();
	}
	public function product() {
		return $this->hasMany('admin\Product')->orderBy('created_at', 'desc');
	}



}
