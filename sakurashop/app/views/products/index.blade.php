@extends('layouts.index')

@section('main')
    <div class="product-page">
        <div class="row">
        @if (count($sellingProducts))
        <!-- BEGIN PRODUCT LIST -->
        <div class="row product-list">
            <h4 class="title-main">Sản phẩm bán chạy</h4>
            @foreach ($sellingProducts as $product)
            <!-- PRODUCT ITEM START -->
            <div class="col-md-3 col-sm-6 col-xs-12">
                <div class="product-item gray-background">
                    <a title="{{{$product->name}}}" href="{{URL::to("/")}}/san-pham/{{{ $product->alias }}}">
                    <div class="pi-img-wrapper">
                        <img src="{{URL::to("/images/cache/")}}/{{Config::get('configs.thumb_image')}}/{{{$product->image}}}" data-src="{{{ $product->image }}}" class="img-responsive" alt="Berry Lace Dress">
                    </div>
                        <div class="product-box-info">
                            <p class="name-product">Tên : {{{ Str::limit($product->name, 32)  }}}</p>

                        </div>
                    <div class="pi-price">{{ CommonHelper::displaySalePrice($product) }}</div>
                    </a>
                </div>
            </div>
            <!-- PRODUCT ITEM END -->
            @endforeach
        </div>
        <!-- END PRODUCT LIST -->
        @else
            There are no products
        @endif
        @if ($randomProducts->count())
            <!-- BEGIN PRODUCT LIST -->
            <div class="row product-list">
                <h4 class="title-main">Sản phẩm random</h4>
                @foreach ($randomProducts as $product)
                    <!-- PRODUCT ITEM START -->
                    <div class="col-md-3 col-sm-6 col-xs-12">
                        <div class="product-item gray-background">
                            <a title="{{{$product->name}}}" href="{{URL::to("/")}}/san-pham/{{{ $product->alias }}}">
                                <div class="pi-img-wrapper">
                                    <img src="{{URL::to("/images/cache/")}}/{{Config::get('configs.thumb_image')}}/{{{$product->image}}}" data-src="{{{ $product->image }}}" class="img-responsive" alt="Berry Lace Dress">
                                </div>
                                <div class="product-box-info">
                                    <p class="name-product">{{{ Str::limit($product->name, 32)  }}}</p>

                                </div>


                                <div class="pi-price">{{ CommonHelper::displaySalePrice($product) }}</div>
                            </a>
                        </div>
                    </div>
                    <!-- PRODUCT ITEM END -->
                @endforeach
            </div>
            <!-- END PRODUCT LIST -->
        @else
            There are no products
            @endif
</div>
</div>
    <!-- END CONTENT -->
@stop
