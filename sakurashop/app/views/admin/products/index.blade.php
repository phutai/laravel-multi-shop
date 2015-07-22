@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-basket font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Quản lý {{Lang::get('products.products')}}</span>
                </div>

                <div class="actions">
                 <a href="{{URL::route('admin.products.create')}}"  class="btn btn-circle btn-default">
                        <i class="fa fa-plus"></i>
                            Tạo sản phẩm
                        </a>
                                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
										<span>
										</span>                            
                           <input class="table-group-action-input form-control input-inline input-small input-sm" name="search-box" data-box-search="" type="text" />
                                    <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Search</button>
                        <button class="btn btn-sm btn-danger table-group-action-delete"><i class="fa fa-trash"></i>
                            Xóa
                        </button>                       
                            
                                </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_orders">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="2%">
                                <input type="checkbox" class="group-checkable">
                            </th>
                            <th>
                                Hình ảnh
                            </th>
                            <th>
                                Model
                            </th>
                            <th>
                                Tên sản phẩm
                            </th>
                            <th>
                                Giá sĩ
                            </th>
                            <th>
                                Giá lẻ
                            </th>
                            <th>
                                Ngày tạo
                            </th>
                            <th width="20%">
                                Thao tác
                            </th>
                        </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- End: life time stats -->
    </div>
    <input type="hidden" datatable-url="" value="/admin/products/loadProducts">
@stop

@section('scripts')
    <!-- BEGIN PAGE LEVEL PLUGINS -->
    <script type="text/javascript" src="../../assets/global/plugins/select2/select2.min.js"></script>
    <script type="text/javascript"
            src="../../assets/global/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script type="text/javascript"
            src="../../assets/global/plugins/datatables/plugins/bootstrap/dataTables.bootstrap.js"></script>
    <script type="text/javascript"
            src="../../assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js"></script>
    <!-- END PAGE LEVEL PLUGINS -->
    <!-- BEGIN PAGE LEVEL SCRIPTS -->
    <script src="../../assets/global/scripts/metronic.js" type="text/javascript"></script>
    <script src="../../assets/admin/layout2/scripts/layout.js" type="text/javascript"></script>
    <script src="../../assets/admin/layout2/scripts/demo.js" type="text/javascript"></script>
    <script src="../../assets/global/scripts/datatable.js"></script>
    <script src="../../assets/admin/pages/scripts/ecommerce-products.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
     $.fn.pressEnter = function(fn) {  

        return this.each(function() {  
        $(this).bind('enterPress', fn);
        $(this).keyup(function(e){
            if(e.keyCode == 13)
            {
              $(this).trigger("enterPress");
            }
        })
    });  
 }; 
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            EcommerceOrders.init();
            $('[data-box-search]').pressEnter(function(){
                $('.table-group-action-submit').trigger('click');
            })

            
        });

       
    </script>
@stop
