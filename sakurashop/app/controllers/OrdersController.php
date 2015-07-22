<?php
use admin\Order;
use admin\Store;
use admin\Orderproduct;

class OrdersController extends BaseController
{
    
    /**
     * Order Repository
     *
     * @var Order
     */
    protected $order;
    
    public function __construct(Order $order) {
        $this->order = $order;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $orders = $this->order->all();
        
        return View::make('orders.index', compact('orders'));
    }
     
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('orders.create');
    }

    public function orderHistory() {
        $authentication = \App::make('authenticator');
        if (is_null($authentication->getLoggedUser())) return Redirect::route('products.index');

        $user_id = $authentication->getLoggedUser()->id;

        $orders = $this->order->with('order_detail')->where('user_id', '=', $user_id)->orderBy('created_at', 'desc')->get();
        
        return View::make('orders.history', compact('orders'));
    }
    public function detail($id) {
        $authentication = \App::make('authenticator');
        if (is_null($authentication->getLoggedUser())) return Redirect::route('products.index');

        $user_id = $authentication->getLoggedUser()->id;

        $order = $this->order->with('order_detail')->find($id);//->where('id', '=', $id)->get();
        if(!$order) Redirect::route('products.index');
        
        return View::make('orders.detail', compact('order'));
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        if (Cart::totalItems() == 0) return Redirect::route('orders.create')->with('message', 'Bạn cần thêm sản phẩm vào giỏ hàng trước!');
        $input = array_except(Input::all(), '_token');
        
        // Make the insert...
        $validation = Validator::make($input, Order::$rules);
        
        if ($validation->passes()) {
            $input['quantity'] = Cart::totalItems();
            $input['total'] = Cart::total(false);
            $authentication = \App::make('authenticator');
            if (!is_null($authentication->getLoggedUser())) {
                $input['user_id'] = $authentication->getLoggedUser()->id;
            }

            $store = CommonHelper::getInfo();
            $input['store_id'] = $store->id;
            $result = $this->order->create($input);
            $new_id = $result->id;
            if ($result) {
                $carts = Cart::contents(true);                          
                foreach ($carts as $cart) {
                    $order_product = new Orderproduct();                        
                    $item = array();
                    $item['order_id'] = $new_id;
                    $item['product_id'] = $cart['id'];
                    $item['name'] = $cart['name'];
                    $item['quantity'] = $cart['quantity'];
                    $item['price'] = $cart['price'];
                    $item['total'] = $cart['price'] * $cart['quantity'];
                    $item['image'] = $cart['image'];
                    $item['model'] = $cart['model'];
                    $item['options'] = (!empty($cart['options'])) ? json_encode($cart['options']) : json_encode(array());
                    $order_product->create($item);
                }
                Cart::destroy();
            }
            return View::make('orders.success');;
        }
        return Redirect::route('orders.create')->withInput()->withErrors($validation)->with('message', 'There were validation errors.');
    }
    
    //    private function orderOption($option, $order_id, $orderproduct_id)
    //    {
    //        $order_option = new Orderoption();
    //        $result = $order_option->width('option')->where('name', '=', $option)->first();
    //        echo '<pre>';
    //        print_r($result);
    //        die;
    //    }
    
    public function addAjax() {
        $input = array_except(Input::all(), '_token');
        
        // Make the insert...
        Cart::insert($input);
        $result = array();
        $result['items'] = Cart::contents(true);
        $result['totalItems'] = Cart::totalItems();
        $result['total'] = Cart::total(false);
        
        return Response::json($result);
    }
    
    public function viewCart() {
        $carts = Cart::contents(true);
        
        return View::make('orders.show', compact('carts'));
    }
    
    public function removeItem() {
        $input = Input::all();
        $item = Cart::item($input['cartid']);
        $item->remove();
        return Redirect::away('/cart/view');
    }
    
    function checkout() {
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function show($id) {
        $order = $this->order->findOrFail($id);
        
        return View::make('orders.show', compact('order'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return Response
     */
    public function edit($id) {
        $order = $this->order->find($id);
        
        if (is_null($order)) {
            return Redirect::route('orders.index');
        }
        
        return View::make('orders.edit', compact('order'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return Response
     */
    public function update($id) {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Order::$rules);
        
        if ($validation->passes()) {
            $order = $this->order->find($id);
            $order->update($input);
            
            return Redirect::route('orders.show', $id);
        }
        
        return Redirect::route('orders.edit', $id)->withInput()->withErrors($validation)->with('message', 'There were validation errors.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return Response
     */
    public function destroy($id) {
        $this->order->find($id)->delete();
        
        return Redirect::route('orders.index');
    }
}
