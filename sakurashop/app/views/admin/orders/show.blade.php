@extends('layouts.scaffold')
<style type="text/css">
.invoice-title h4, .invoice-title h5 {
    display: inline-block;
}

.table > tbody > tr > .no-line {
    border-top: none;
}

.table > thead > tr > .no-line {
    border-bottom: none;
}

.table > tbody > tr > .thick-line {
    border-top: 1px solid;
}
</style>
<div class="container">
    <div class="row">
        <div class="col-xs-12">
    		<div class="invoice-title">
    			<h4>{{$shopinfo->shopinfo->store_name}}</h4>
                <h5 class="pull-right">Đơn hàng #{{$order->id}}</h5>
    		</div>
    		<hr>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    				<strong>Thông tin shop:</strong><br>
    					{{$shopinfo->shopinfo->store_address}}<br>
    					{{$shopinfo->shopinfo->store_tel}}
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
        			<strong>Thông tin khách hàng:</strong><br>
    					{{{$order->fullname}}}<br>
    					{{{$order->phone}}}<br>
    					{{{$order->address}}}
    				</address>
    			</div>
    		</div>
    		<div class="row">
    			<div class="col-xs-6">
    				<address>
    					<strong>Phương thức thanh toán:</strong><br>
    					Chi phí vận chuyển<br>
    				</address>
    			</div>
    			<div class="col-xs-6 text-right">
    				<address>
    					<strong>Ngày đặt hàng:</strong><br>
    					{{Carbon::parse($order->created_at)->format('d/m/Y h:i A')}}<br><br>
    				</address>
    			</div>
    		</div>
    	</div>
    </div>
    
    <div class="row">
    	<div class="col-md-12">
    		<div class="panel panel-default">
    			<div class="panel-heading">
    				<h3 class="panel-title"><strong>Chi tiết đơn hàng</strong></h3>
    			</div>
    			<div class="panel-body">
    				<div class="table">
    					<table class="table table-condensed">
    						<thead>
                                 <tr>
                                <th>Hình ảnh</th>
                                <th>Tên sản phẩm</th>
                                <th>Model</th>
                                <th>Số lượng</th>
                                <th>Đơn giá</th>
                                <th class="text-center">Tổng</th>
                            </tr>
    						</thead>
    						<tbody>
    							 @foreach($order->order_detail as $product)
                                <tr>
                                    <td>
                                        <img src="/images/cache/{{Config::get('configs.thumb_image')}}/{{$product->image}}"
                                             style="border: 1px solid #DDDDDD; width: 80px; height:110px;"></td>
                                    <td>{{{$product->name}}}

                                        <?php $options = json_decode($product->options, true) ?>
                                        @if(count($options))
                                            <br/>
                                            <small>
                                                @foreach($options as $option)
                                                    {{$option}}<br/>
                                                @endforeach
                                            </small>
                                        @endif

                                    </td>
                                    <td>{{{$product->model}}}</td>
                                    <td>{{{$product->quantity}}}</td>
                                    <td>{{{CommonHelper::format_money($product->price)}}}</td>
                                    <td class="text-center">{{{CommonHelper::format_money($product->total)}}}</td>
                                </tr>
                            @endforeach
    							<tr>
    								<td class="thick-line"></td>
                                    <td class="thick-line"></td>
                                    <td class="thick-line"></td>
    								<td class="thick-line"></td>
    								<td class="thick-line text-center"><strong>Tổng số lượng:</strong></td>
    								<td class="thick-line text-right">{{$order->quantity}}</td>
    							</tr>
    							<tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Thành tiền:</strong></td>
    								<td class="no-line text-right">{{{CommonHelper::format_money($order->total)}}}</td>
    							</tr>
    							<tr>
                                    <td class="no-line"></td>
                                    <td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line"></td>
    								<td class="no-line text-center"><strong>Tổng cộng :</strong></td>
    								<td class="no-line text-right">{{{CommonHelper::format_money($order->total)}}}</td>
    							</tr>
    						</tbody>
    					</table>
    				</div>
    			</div>
    		</div>
    	</div>
    </div>
</div>