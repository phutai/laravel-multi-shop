<?php
namespace admin;

use \View;
use \Response;
use \Input;
use \Validator;
use \Redirect;
use \DB;

class ShopinfosController extends \admin\BaseController
{
    
    /**
     * Shopinfo Repository
     *
     * @var Shopinfo
     */
    protected $shopinfo;
    protected $store;
    
    public function __construct(Shopinfo $shopinfo) {
        $this->shopinfo = $shopinfo;
        $store = new Store;
        $this->store = $store;
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index() {
        $shopinfos = $this->shopinfo->all();
        return View::make('admin.shopinfos.index', compact('shopinfos'));
    }
    
    /**
     * @return mixed
     */
    public function results() {
        
        $posts = Shopinfo::select('shopinfos.id', 'shopinfos.store_name', 'shopinfos.store_tel', 'shopinfos.store_address', 'shopinfos.created_at');
        
        return \Bllim\Datatables\Facade\Datatables::of($posts)->add_column('operations', '
{{ link_to_route("admin.shopinfos.edit", "Edit", array($id), array("class" => "btn btn-info")) }}
                ')->edit_column('id', function ($row) {
            return "<input type=\"checkbox\" name=\"id[]\" value=\"{$row->id}\">";
        })->make();
    }
    
    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create() {
        return View::make('admin.shopinfos.create');
    }
    
    /**
     * Store a newly created resource in storage.
     *
     * @return Response
     */
    public function store() {
        $input = Input::all();
        $validation = Validator::make($input, Shopinfo::rules());
        
        if ($validation->passes()) {
            $this->shopinfo->create($input);
            
            //Start create image
            try {
                $file = Input::file('store_baner');
                $file_mobile = Input::file('store_mobile');
                $destinationPath = 'image/data';
                if (!is_null($file)) {                
                // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                $filename = $file->getClientOriginalName();
                //$extension =$file->getClientOriginalExtension();
                $upload_success = $file->move($destinationPath, $filename);
                if ($upload_success) $input['store_baner'] = $filename;
                }
                if (!is_null($file_mobile)) {                
                // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                $filename_mobile = $file_mobile->getClientOriginalName();
                //$extension =$file->getClientOriginalExtension();
                $mobile_success = $file_mobile->move($destinationPath, $filename_mobile);
                if ($mobile_success) $input['store_mobile'] = $filename_mobile;
                }
            }
            catch(\Exception $ex) {
                return Redirect::route('admin.shopinfos.create')->withInput()->with('message', 'There were image errors.');
            }
            
            //End create image
            
            return Redirect::route('admin.shopinfos.index');
        }
        
        return Redirect::route('admin.shopinfos.create')->withInput()->withErrors($validation)->with('message', 'There were validation errors.');
    }
    
    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function show($id) {
        $shopinfo = $this->shopinfo->findOrFail($id);
        
        return View::make('admin.shopinfos.show', compact('shopinfo'));
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return Response
     */
    public function edit($id) {
        $shopinfo = $this->shopinfo->find($id);
        
        if (is_null($shopinfo)) {
            return Redirect::route('admin.shopinfos.index');
        }
        
        return View::make('admin.shopinfos.edit', compact('shopinfo'));
    }
    
    /**
     * Update the specified resource in storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function update($id) {
        $input = array_except(Input::all(), '_method');
        $validation = Validator::make($input, Shopinfo::rules($id));        
        if ($validation->passes()) {
            $shopinfo = $this->shopinfo->find($id);
            //Start create image
            try {
                $file = Input::file('store_baner');
                $file_mobile = Input::file('store_mobile');
                $file_map = Input::file('store_map');
                $destinationPath = 'image/data';
                if (!is_null($file)) {                   
                    // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                    $filename = $file->getClientOriginalName();
                    //$extension =$file->getClientOriginalExtension();
                    $upload_success = $file->move($destinationPath, $filename);
                    if ($upload_success) $input['store_baner'] = $filename;
                } else {
                    $input = array_except($input, 'store_baner');
                }
                if (!is_null($file_mobile)) {                
                // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                $filename_mobile = $file_mobile->getClientOriginalName();
                //$extension =$file->getClientOriginalExtension();
                $mobile_success = $file_mobile->move($destinationPath, $filename_mobile);
                if ($mobile_success) $input['store_mobile'] = $filename_mobile;
                }
                else{
                     $input = array_except($input, 'store_mobile');
                }
                if (!is_null($file_map)) {                
                // If the uploads fail due to file system, you can try doing public_path().'/uploads'
                $filename_map = $file_map->getClientOriginalName();
                //$extension =$file->getClientOriginalExtension();
                $map_success = $file_map->move($destinationPath, $filename_map);
                if ($map_success) $input['store_map'] = $filename_map;
                }
                else{
                     $input = array_except($input, 'store_map');
                }
            }
            catch(\Exception $ex) {
                return Redirect::route('admin.shopinfos.create')->withInput()->with('message', 'There were image errors.');
            }            
            //End create image
            $shopinfo->update($input);
            
            return Redirect::route('admin.shopinfos.index', $id);
        }
        
        return Redirect::route('admin.shopinfos.edit', $id)->withInput()->withErrors($validation)->with('message', 'There were validation errors.');
    }
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return Response
     */
    public function destroy($id) {
        $this->shopinfo->find($id)->delete();
        
        return Redirect::route('admin.shopinfos.index');
    }
}
