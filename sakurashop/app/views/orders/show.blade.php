@extends('layouts.index')
@section('meta')
    <title>Giỏ hàng</title>
@stop
@section('main')
    @if(!empty($carts))
        <div class="row margin-bottom-40">
            <!-- BEGIN CONTENT -->
            <div class="col-md-12 col-sm-12">
                <div class="goods-page">
                    <div class="goods-data clearfix">
                        <div class="table-wrapper-responsive">
                            <table summary="Shopping cart">
                                <tr>
                                    <th class="goods-page-image">Ảnh</th>
                                    <th class="goods-page-description">Mô tả</th>
                                    <th class="goods-page-quantity">Số lượng</th>
                                    <th class="goods-page-price">Đơn giá</th>
                                    <th class="goods-page-total" colspan="2">Tổng</th>
                                </tr>
                                @foreach($carts as $key => $cart)
                                    <tr>
                                        <td class="goods-page-image">
                                            <a href="#"><img src="{{URL::to('/images/')}}/{{$cart['image']}}"
                                                             alt="{{$cart['name']}}"></a>
                                        </td>
                                        <td class="goods-page-description">
                                            <h3><a href="#">{{{$cart['name']}}}</a></h3>

                                            <p>@if(!empty($cart['options'])) @foreach($cart['options'] as $opt){{$opt}}<br/> @endforeach @endif</p>
                                        </td>
                                        <td class="goods-page-quantity">
                                            <div class="product-quantity">
                                                {{--<input id="product-quantity" type="text" value="{{{$cart['quantity']}}}"--}}
                                                       {{--readonly class="form-control input-sm">--}}
                                                {{{$cart['quantity']}}}
                                            </div>
                                        </td>
                                        <td class="goods-page-price">
                                            <strong>{{{CommonHelper::format_money($cart['price'])}}}</strong>
                                        </td>
                                        <td class="goods-page-total">
                                            <strong>{{{ CommonHelper::format_money($cart['quantity'] * $cart['price'])}}}</strong>
                                        </td>
                                        <td class="del-goods-col">
                                            <form method="post" action="/cart/remove">
                                                <input type="hidden" name="cartid" value="{{$key}}">
                                                {{ Form::submit('', array('class' => 'del-goods')) }}
                                            </form>
                                            {{--<a class="del-goods" " href="#">&nbsp;</a>--}}
                                        </td>
                                    </tr>
                                @endforeach
                            </table>
                        </div>

                        <div class="shopping-total">
                            <ul>
                                <li>
                                    <em>Tổng số lượng</em>
                                    <strong class="price">{{{Cart::totalItems()}}}</strong>
                                </li>
                                <li>
                                    <em>Thành tiền</em>
                                    <strong class="price">{{{CommonHelper::format_money(Cart::total(false))}}}</strong>
                                </li>
                                <li>
                                    <em>Chi phí vận chuyển</em>
                                    <strong class="price"><span>Chưa có</span></strong>
                                </li>
                                <li class="shopping-total-price">
                                    <em>Tổng cộng</em>
                                    <strong class="price">{{{CommonHelper::format_money(Cart::total(false))}}}</strong>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <button class="btn btn-default" type="submit">Tiếp tục mua hàng <i class="fa fa-shopping-cart"></i>
                    </button>
                    <a class="btn btn-primary" href="{{URL::to('/orders/create')}}">Thanh toán <i class="fa fa-check"></i></a>
                </div>
            </div>
            <!-- END CONTENT -->
        </div>
    @else
    Không có sản phẩm trong giỏ hàng
    @endif
@stop
