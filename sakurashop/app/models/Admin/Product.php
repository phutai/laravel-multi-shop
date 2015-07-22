<?php
namespace admin;
use Illuminate\Support\Facades\DB;

class Product extends \Eloquent
{
    protected $guarded = array();

    public static $rules = array(
        'sale_price' => 'required',
        'special_price' => 'required',
        'model' => 'required',
        'alias' => 'required|unique:products,alias',
        'quantity' => 'required',
        'name' => 'required',
        'category_id' => 'required',
        'size' => 'required',
        'material' => 'required',
        'color' => 'required',
        'image' => 'required',
        'description' => 'required',
    );

    public static function rules($id = 0, $merge = [])
    {
        return array_merge(
            [
                'name' => 'required|unique:products,name' . ($id ? ",$id" : ''),
                'alias' => 'required|unique:products,alias' . ($id ? ",$id" : ''),
                'sale_price' => 'required',
                'special_price' => 'required',
                'model' => 'required',
                'quantity' => 'required',
                'category_id' => 'required',
                'size' => 'required',
                'material' => 'required',
                'color' => 'required',
                'image' => ($id ? '' : 'required'),
                'large_image' => ($id ? '' : 'required')
            ],
            $merge);
    }

    public function category()
    {
        return $this->belongsTo('admin\Category');
    }

    public function options()
    {
        return $this->hasMany('admin\Productoption');
    }

    public static function newProduct()
    {
        $result = DB::select(DB::raw('SELECT * FROM products ORDER BY created_at DESC LIMIT 5'));
        return json_decode(json_encode($result), true);
    }

        /**
 * Get results by page
 *
 * @param int $page
 * @param int $limit
 * @return StdClass
 */
public function getByPage($page = 1, $limit = 10)
{
  $results = StdClass;
  $results->page = $page;
  $results->limit = $limit;
  $results->totalItems = 0;
  $results->items = array();
 
  $users = $this->skip($limit * ($page - 1))->take($limit)->get();
 
  $results->totalItems = $this->model->count();
  $results->items = $users->all();
 
  return $results;
}

}
