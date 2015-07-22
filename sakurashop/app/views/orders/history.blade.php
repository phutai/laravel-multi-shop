@extends('layouts.index')

@section('main')
    <div class="col-md-12">
        <!-- Begin: life time stats -->
        <div class="portlet light">
            <div class="portlet-title">
                <h1>Lịch sử đơn hàng</h1>
            </div>
            <div class="portlet-body">
                @if ($orders->count())
                    <table class="table table-striped">
                        <thead>
                        <tr>
                            <th width="25%">Khách hàng</th>
                            <th width="25%">Số lượng</th>
                            <th width="25%">Tổng tiền</th>
                            <th width="50%">Ngày tạo</th>

                            <th>&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($orders as $order)
                            <tr>
                                <td>{{{ $order->fullname }}}</td>
                                <td>{{{ $order->quantity }}}</td>
                                <td>{{{CommonHelper::format_money($order->total)}}}</td>
                                <td>{{{$order->created_at}}}</td>
                                <td>
                                 <a href="{{URL::to('/tai-khoan/chi-tiet-don-hang/')}}/{{$order->id}}" class="btn btn-info">Chi tiết</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                     @else
                        Bạn không có đơn hàng.
                    @endif
            </div>
        </div>
    </div>
   

@stop
