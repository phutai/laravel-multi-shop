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
                            <th width="25%">Số lượng</th>
                            <th width="25%">Tổng tiền</th>
                            <th width="25%">Tình trạng</th>
                            <th width="50%">Ngày tạo</th>

                            <th>&nbsp;</th>
                        </tr>
                        </thead>

                        <tbody>
                        @foreach ($categories as $order)
                            <tr>
                                <td>{{{ $order->quantity }}}</td>
                                <td>{{{ $order->total }}}</td>
                                <td>{{{ $order->status }}}</td>
                                <td>{{{ $order->created_at }}}</td>
                                <td>
                                   
                                    
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
            </div>
        </div>
    </div>
    @else
        There are no categories
    @endif

@stop
