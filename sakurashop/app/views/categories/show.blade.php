@extends('layouts.index')
@section('main')
    @if ($products->count())
        <div class="product-page">
            <div class="row">
            <div class="row product-list">
                <!-- BEGIN PRODUCT LIST -->
                    <!-- PRODUCT ITEM START -->
                    @foreach ($products as $product)
                        <div class="col-md-3 col-sm-6 col-xs-12">
                            <div class="product-item gray-background">
                                <a title="{{{$product->name}}}"
                                   href="{{URL::to("/")}}/san-pham/{{{ $product->alias }}}">
                                    <div class="pi-img-wrapper">
                                        <img src="{{URL::to("/images/cache/")}}/{{Config::get('configs.thumb_image')}}/{{{$product->image}}}"
                                             data-src="{{{ $product->image }}}" class="img-responsive"
                                             alt="Berry Lace Dress">
                                    </div>
                                    <div class="product-box-info">
                                        <p class="name-product">Mã số : <b>{{{ $product->model }}}</b><br/>Tên : {{{ Str::limit($product->name, 32)  }}}</p>

                                    </div>
                                    <div class="pi-price">{{ CommonHelper::displaySalePrice($product) }}</div>
                                </a>
                            </div>
                        </div>
                        @endforeach
                                <!-- PRODUCT ITEM END -->
                </div>
                <?php echo $products->links(); ?>
            </div>
        </div>
        {{--</div>--}}
        <!-- END PRODUCT LIST -->
    @else
        Xin lỗi, không thể tìm thấy sản phẩm.
        @endif
                <!-- END CONTENT -->
@stop

