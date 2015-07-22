<?php

namespace admin;



use \View;

use \Response;

use \Input;

use \Validator;

use \Redirect;

use \CommonHelper;

use \MailHelper;

use \Config;

use \Jacopo\Authentication\Models\User as User;



class OrdersController extends \admin\BaseController

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

    public function createMail(){

        return View::make('admin.email.form');

    }

    public function sendMail(){

        $subject = Input::get('subject');

        $contents = Input::get('contents');

        $users = User::all();

        $mail = new MailHelper($contents, $subject);

        foreach ($users as $key => $value) {

            $email = $value['email'];
            //if($email != 'tai@phutai.me') continue;
            $mail->setEmail($email);
            $mail->sendEmail();

        }

        return Redirect::to('/admin/createMail')->with('success', 'Gửi email toàn bộ thành viên thành công!');

    }   

    /**

     * Display a listing of the resource.

     *

     * @return Response

     */

    public function index() {

        $authentication = \App::make('authenticator');

        

        $authentication->getLoggedUser()->permissions;

        

        return View::make('admin.orders.index');

    }

    public function loadOrders() {

        if (Input::has('delete')) {

            $ids = Input::get('id');

            

            foreach ($ids as $id) {

                $this->order->find($id)->delete();

                $order_products = new Orderproduct();

                $order_products->where('order_id', '=', $id)->delete();

            }

        }

        $shopinfo = CommonHelper::getInfo();

        $posts = Order::select(array('orders.id', 'orders.fullname', 'orders.quantity', 'orders.total', 'orders.created_at'))->where('store_id', '=', $shopinfo->id)->orderBy('created_at', 'desc');

        

        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '

                    {{ link_to_route("admin.orders.edit", Lang::get("common.show"), array($id), array("class" => "btn btn-info")) }}

                    {{ link_to_route("admin.orders.show", "In hóa đơn", array($id), array("class" => "btn btn-info")) }}

                ')->edit_column('id', function ($row) {

            return "<input type=\"checkbox\" name=\"id[]\" value=\"{$row->id}\">";

        })->edit_column('total', function ($row) {

            return CommonHelper::format_money($row->total);

        })->edit_column('created_at', function ($row) {

            

            return \Carbon::parse($row->created_at)->format('d/m/Y h:i A');

        })->make();

    }

    

    /**

     * Show the form for creating a new resource.

     *

     * @return Response

     */

    public function create() {

        return View::make('admin.orders.create');

    }

    

    /**

     * Store a newly created resource in storage.

     *

     * @return Response

     */

    public function store() {

        

        //

        

        

    }

    

    /**

     * Display the specified resource.

     *

     * @param  int  $id

     * @return Response

     */

    public function show($id) {

         $order = $this->order->with('order_detail')->find($id);

        

        if (is_null($order)) {

            return Redirect::route('admin.orders.index');

        }

        $shopinfo = CommonHelper::getInfo();

        View::share('shopinfo', $shopinfo);

        return View::make('admin.orders.show', compact('order'));

    }

    

    /**

     * Show the form for editing the specified resource.

     *

     * @param  int  $id

     * @return Response

     */

    public function edit($id) {

        $order = $this->order->with('order_detail')->find($id);

        

        if (is_null($order)) {

            return Redirect::route('admin.orders.index');

        }

        

        return View::make('admin.orders.edit', compact('order'));

    }

    

    /**

     * Update the specified resource in storage.

     *

     * @param  int  $id

     * @return Response

     */

    public function update($id) {

        

        //

        

        

    }

    

    /**

     * Remove the specified resource from storage.

     *

     * @param  int  $id

     * @return Response

     */

    public function destroy($id) {

        $this->order->find($id)->delete();

        $order_products = new Orderproduct();

        $order_products->where('order_id', '=', $id)->delete();

        return Redirect::route('admin.orders.index');

    }

}

