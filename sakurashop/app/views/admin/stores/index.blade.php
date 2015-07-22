@extends('admin.layouts.admin')

@section('main')
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-basket font-green-sharp"></i>
                    <span class="caption-subject font-green-sharp bold uppercase">Quản lý gian hàng</span>
                </div>
                <div class="actions">
                    <a href="{{URL::route('admin.stores.create')}}" class="btn btn-circle btn-default">
                        <i class="fa fa-plus"></i> Add New Store
                        <span class="hidden-480"></span>
                    </a>

                    <div class="btn-group">
                        <a class="btn btn-default btn-circle" href="#" data-toggle="dropdown">
                            <i class="fa fa-share"></i>
										<span class="hidden-480">
										Tools </span>
                            <i class="fa fa-angle-down"></i>
                        </a>
                        <ul class="dropdown-menu pull-right">
                            <li>
                                <a href="#">
                                    Export to Excel </a>
                            </li>
                            <li>
                                <a href="#">
                                    Export to CSV </a>
                            </li>
                            <li>
                                <a href="#">
                                    Export to XML </a>
                            </li>
                            <li class="divider">
                            </li>
                            <li>
                                <a href="#">
                                    Print Invoices </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
            <div class="portlet-body">
                <div class="table-container">
                    <div class="table-actions-wrapper">
										<span>
										</span>
                        <select class="table-group-action-input form-control input-inline input-small input-sm">
                            <option value="">Select...</option>
                            <option value="Cancel">Cancel</option>
                            <option value="Cancel">Hold</option>
                            <option value="Cancel">On Hold</option>
                            <option value="Close">Close</option>
                        </select>
                        <button class="btn btn-sm yellow table-group-action-submit"><i class="fa fa-check"></i> Submit
                        </button>
                    </div>
                    <table class="table table-striped table-bordered table-hover" id="datatable_orders">
                        <thead>
                        <tr role="row" class="heading">
                            <th width="2%">
                                <input type="checkbox" class="group-checkable">
                            </th>
                            <th width="5%">
                                Tên miền
                            </th>
                            <th width="15%">
                                Tên cửa hàng
                            </th>
                            <th width="15%">
                                Tên khách hàng
                            </th>
                            <th width="10%">
                                Ngày tạo
                            </th>
                            <th width="10%">
                                Chu kỳ
                            </th>
                            <th width="10%">
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
    <input type="hidden" datatable-url="" value="/admin/stores/loadStores">
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
