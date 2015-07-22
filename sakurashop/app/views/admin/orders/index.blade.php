@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-basket font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Quản lý {{Lang::get('orders.orders')}}</span>
                </div>
                {{--<div class="actions">--}}
                {{--<a href="{{URL::route('admin.stores.create')}}" class="btn btn-circle btn-default">--}}
                {{--<i class="fa fa-plus"></i> Add New Store--}}
                {{--<span class="hidden-480"></span>--}}
                {{--</a>--}}

                {{--<div class="btn-group">--}}
                {{--<a class="btn btn-default btn-circle" href="#" data-toggle="dropdown">--}}
                {{--<i class="fa fa-share"></i>--}}
                {{--<span class="hidden-480">--}}
                {{--Tools </span>--}}
                {{--<i class="fa fa-angle-down"></i>--}}
                {{--</a>--}}
                {{--<ul class="dropdown-menu pull-right">--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--Export to Excel </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--Export to CSV </a>--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--Export to XML </a>--}}
                {{--</li>--}}
                {{--<li class="divider">--}}
                {{--</li>--}}
                {{--<li>--}}
                {{--<a href="#">--}}
                {{--Print Invoices </a>--}}
                {{--</li>--}}
                {{--</ul>--}}
                {{--</div>--}}
                {{--</div>--}}
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
										<span>
										</span>
                        <a href="{{URL::route('admin.products.create')}}" class="btn btn-sm btn-success"><i
                                    class="fa fa-plus"></i>
                            Tạo sản phẩm
                        </a>
                        <button class="btn btn-sm btn-danger table-group-action-submit"><i class="fa fa-trash"></i>
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
                                Tên khách hàng
                            </th>
                            <th>
                                Số lượng
                            </th>
                            <th>
                                Tổng
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
    <input type="hidden" datatable-url="" value="{{URL::to('/admin/orders/loadOrders')}}">
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
    <script src="../../assets/admin/pages/scripts/ecommerce-orders.js"></script>
    <!-- END PAGE LEVEL SCRIPTS -->
    <script>
        jQuery(document).ready(function () {
            Metronic.init(); // init metronic core components
            Layout.init(); // init current layout
            Demo.init(); // init demo features
            EcommerceOrders.init();
        });
    </script>
@stop
