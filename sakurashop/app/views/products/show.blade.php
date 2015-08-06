@extends('layouts.index')

@section('main')
    <!-- BEGIN CONTENT -->
    <div class="product-page">
        <div class="row">
            <div class="col-md-4 col-sm-6">
                <h1>Chi tiết :  {{{ $product->model }}}</h1>
                <div class="product-main-image">
                    <a href="{{URL::to("/images/cache/")}}/{{Config::get('configs.full_image')}}/{{{$product->large_image}}}"
                       data-jbox-image="gallery1" title="Ảnh sản phẩm">
                        <img src="{{URL::to("/images/")}}/{{{$product->image}}}" alt="Cool green dress with red bell"
                             class="img-responsive" data-BigImgsrc="">
                    </a>
                </div>

            </div>
            <div class="col-md-8 col-sm-6">
                <h1>&nbsp;</h1>
                <div class="description product-page-content">
                    <table class="datasheet table">
                        <tr>
                            <td class="datasheet-features-type col-md-4">Mã số</td>
                            <td>{{{$product->model}}}</td>
                        </tr>
                        <tr>
                            <td class="datasheet-features-type  col-md-4">Tên sản phẩm</td>
                            <td>{{{$product->name}}}</td>
                        </tr>
                        <tr>
                            <td class="datasheet-features-type  col-md-4">Giá</td>
                            <td class="show-sale-price">{{{CommonHelper::format_money(CommonHelper::processPrice($product))}}}</td>
                        </tr>
                        {{--<tr>--}}
                            {{--<td class="datasheet-features-type  col-md-4">Size</td>--}}
                            {{--<td>{{{$product->size}}}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td class="datasheet-features-type  col-md-4">Chất liệu</td>--}}
                            {{--<td>{{{$product->material}}}</td>--}}
                        {{--</tr>--}}
                        {{--<tr>--}}
                            {{--<td class="datasheet-features-type  col-md-4">Màu sắc</td>--}}
                            {{--<td>{{{$product->color}}}</td>--}}
                        {{--</tr>--}}
                        <tr>
                            <td class="datasheet-features-type col-md-4">Tình trạng</td>
                            <td>{{{ ($product->status)? "Còn hàng" : "Hết hàng" }}}</td>
                        </tr>
                        {{ Form::open(array('route' => 'orders.store', 'class' => 'form-horizontal')) }}
                        <input type="hidden" data-id="" name="id" value="{{{$product->id}}}">
                        <input type="hidden" data-name="" name="name" value="{{{$product->name}}}">
                        <input type="hidden" data-price="" name="price"
                               value="{{{CommonHelper::processPrice($product)}}}">
                        <input type="hidden" data-image="" name="image" value="{{{$product->image}}}">
                        <input type="hidden" data-model="" name="model" value="{{{$product->model}}}">
                        @if(!empty($options))
                            @foreach($options as $opt)
                                <tr>
                                    <td class="datasheet-features-type"><span
                                                class="required">*</span>Chọn {{{$opt['name']}}}
                                    </td>
                                    <td>
                                        {{Form::select('option[]', CommonHelper::array_selects($opt,'name','option'), null, array('data-option'=>'true','class' => 'form-control input-sm select-sm'))}}
                                    </td>
                                </tr>
                            @endforeach
                        @endif
                        <tr>
                            <td class="datasheet-features-type col-md-4">Chọn số lượng</td>
                            <td>
                                <input data-quantity="" name="quantity" type="number" min="1" onclick="this.select()"
                                       value="1"
                                       class="col-md-2 form-control input-sm select-sm">
                            </td>
                        </tr>

                    </table>
                </div>
                <div class="product-page-cart">
                    <br/>
                    <button class="btn btn-primary btn-larger btn-add-to-class"
                            type="submit">{{Lang::get('products.add_cart')}}</button>
                    &nbsp;
                   
                </div>
            </div>
            {{Form::close()}}
            <div class="product-page-content">
                <div class="pull-left" style="width: 200px;"><h5 style="color: black;">{{Lang::get('products.image_description')}}</h5></div>
                 <div class="pull-right">
                        <a class="cart-tutorial" href="#huong-dan-mua-hang" title="<b>Bước 1: Đặt mua<br/>
                        Bước 2: Vào giỏ hàng màu xanh chọn thanh toán (góc trên bên phải website)<br/>
                        Bước 3: Xác nhận đơn hàng</b>" style="color: black;">Hướng dẫn mua hàng</a>
                    </div>
                <ul id="myTab" class="nav nav-tabs">
                    <!-- <li class="active"></li> -->
                </ul>
                <div id="myTabContent" class="tab-content">
                    <div class="tab-pane fade in active" id="Description">
                        <img src="{{URL::to("/images/cache/")}}/{{Config::get('configs.full_image')}}/{{{$product->large_image}}}"
                    </div>

                </div>
            </div>
        </div>
    </div>

    <!-- END CONTENT -->
@stop
@section('scripts')
    <link type="text/css" rel="stylesheet" href="{{URL::to("/assets/frontend/pages/css/sweet-alert.css")}}"/>
    <link type="text/css" rel="stylesheet" href="{{URL::to("/assets/frontend/pages/css/jBox.css")}}"/>
    <script type="text/javascript" src="{{URL::to("/js/jBox.min.js")}}"></script>
    <script type="text/javascript" src="{{URL::to("/assets/frontend/pages/scripts/sweet-alert.min.js")}}"></script>
    <script>
        $(document).ready(function () {
            $('.cart-tutorial').jBox('Tooltip');
            new jBox('Image');
            $('.btn-add-to-class').bind('click', function (e) {
                e.preventDefault();
                var id = $('[data-id]').val();
                var name = $('[data-name]').val();
                var price = $('[data-price]').val();
                var image = $('[data-image]').val();
                var quantity = $('[data-quantity]').val();
                var model = $('[data-model]').val();
                var option = [];
                var isValid = true;
                 $('.error').each(function(){
                            $(this).remove();
                        })
                $('[data-option]').each(function () {
                    var name = $(this).find('option:selected').text();
                    var value = $(this).find('option:selected').attr('value');
                    if (value !== '0') {
                        option.push(name);
                    }
                    else {
                       $(this).parent().append('<span class="error">Không được bỏ trống!</span>');
                        isValid = false;
                    }

                });
                if (isValid) {
                    var data = {
                        id: id,
                        name: name,
                        price: price,
                        quantity: quantity,
                        image: image,
                        model: model,
                        options: option
                    }
                    $.ajax({
                        dataType: "json",
                        url: '/cart/addAjax',
                        data: data,
                        success: (function (json) {
                            if ($.isEmptyObject(json) == false) {
                                swal({
                                    title: "Thêm thành công!",
                                    text: "Sản phẩm đã được thêm vào giỏ hàng!",
                                    type: "success",
                                    showCancelButton: true,
                                    confirmButtonColor: "green",
                                    confirmButtonText: "Thanh toán",
                                    cancelButtonText: "Tiếp tục mua hàng",
                                    closeOnConfirm: false
                                }, function () {
                                    var location = $('[data-btn-checkout]').attr('href');
                                    window.location = location;
                                });
                                $('[data-bind-cart]').empty();
                                $('.top-cart-info-count').html(json.totalItems + " sản phẩm");
                                $('.top-cart-info-value').html(json.total + " VNĐ");
                                $.each(json.items, function (i, val) {
                                    var $clone = $('[data-clone-item] > li').clone();
                                    $clone.find('.cart-content-count').html('x' + val.quantity);
                                    $clone.find('.data-cart-name').html(val.name);
                                    $clone.find('.data-cart-price').html(val.price);
                                    $clone.find('[data-cart-id]').val(i);
                                    $clone.find('.image-item-cart').attr('src', '/images/' + val.image);
                                    $clone.appendTo('[data-bind-cart]');
                                })
                            }
                            //else {
                            //  $('[data-bind-cart]').empty();
                            //}
                        }),
                        fail: (function () {
                            sweetAlert("Oops...", "Something went wrong!", "error");
                        }),
                        error: (function () {
                            sweetAlert("Oops...", "Something went wrong!", "error");
                        })
                    });
                }
            })
            return false;
        })
    </script>
@stop
@section('meta')
    <title>{{{$product->name}}}</title>
    <meta content="{{{$product->meta_title}}}" name="title">
    <meta content="{{{$product->meta_description}}}" name="description">
    <meta content={{{$product->meta_keywords}}}"" name="keywords">
@stop

