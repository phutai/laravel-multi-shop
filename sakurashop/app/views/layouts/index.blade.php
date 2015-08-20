<!DOCTYPE html>
<!--[if IE 8]>
<html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]>
<html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->

<!-- Head BEGIN -->
<head>
    <meta charset="utf-8">

    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">

    @include('layouts.meta')

    <link rel="shortcut icon" href="favicon.ico">
    @include('layouts.styles')
</head>
<!-- Head END -->
@section('meta')
    <title>{{{$shopinfo->shopinfo->store_name}}}</title>
    <meta content="{{{$shopinfo->shopinfo->meta_title}}}" name="title">
    <meta content="{{{$shopinfo->shopinfo->meta_description}}}" name="description">
    <meta content={{{$shopinfo->shopinfo->meta_keywords}}}"" name="keywords">
    @stop
            <!-- Body BEGIN -->
    <body class="ecommerce">
    <!-- BEGIN TOP BAR -->
    <div class="pre-header">
        <div class="container">
            <div class="row">
                <!-- BEGIN TOP BAR LEFT PART -->
                @if(!isset($isMobile))
                    <div class="col-md-6 col-sm-6 additional-shop-info">
                        <p><b>Chào bạn đến với sakurashopvn !</b></p>
                    </div>

                    <!-- END TOP BAR LEFT PART -->

                    <!-- BEGIN TOP BAR MENU -->
                    <div class="col-md-6 col-sm-6 additional-nav">
                        <ul class="list-unstyled list-inline pull-right">
                            @if(is_null($user_login = CommonHelper::getUserLogin()))
                                <li><a href="{{URL::to("/login")}}"><b>Đăng nhập</b></a></li>
                                <li><a href="{{URL::to("/user/signup")}}"><b>Đăng ký</b></a></li>
                            @else
                                <li><a href="#"><b>Xin chào {{{$user_login->profile->first_name}}}</b></a></li>
                                <li><a href="{{URL::to("/user/logout")}}" style="color:#ff0000"><b>Thoát</b></a></li>
                            @endif
                        </ul>
                    </div>
                    <!-- END TOP BAR MENU -->

                @else
                    @if(is_null($authentication->getLoggedUser()))
                        <div class="col-md-6 col-sm-6 additional-shop-info">
                            <a href="{{URL::to("/login")}}"><b>Đăng nhập</b></a>
                        </div>

                        <!-- END TOP BAR LEFT PART -->
                        <!-- BEGIN TOP BAR MENU -->
                        <div class="col-md-6 col-sm-6 additional-nav pull-right" style="text-align: right;">
                            <a href="{{URL::to("/user/signup")}}"><b>Đăng ký</b></a>
                        </div>
                        <div class="clearfix"></div>
                    @else
                        <div class="col-md-6 col-sm-6 additional-shop-info">
                            <a href="#"><b>Xin chào {{{$user_login->profile->first_name}}}</b></a>
                        </div>

                        <!-- END TOP BAR LEFT PART -->
                        <!-- BEGIN TOP BAR MENU -->
                        <div class="col-md-6 col-sm-6 additional-nav pull-left" style="text-align: right;">
                            <a href="{{URL::to("/user/logout")}}" style="color:#ff0000"><b>Thoát</b></a>
                        </div>
                        <div class="clearfix"></div>
                    @endif
                @endif
            </div>
        </div>
    </div>
    <!-- END TOP BAR -->

    <!-- BEGIN HEADER -->
    <div class="header">
        <div class="container">

            @if(isset($isMobile) && !isset($isTablet))
                <a href="{{URL::to('/')}}"><img src="{{URL::to('/image/data/')}}/{{$shopinfo->shopinfo->store_mobile}}" style="height:120px; width:380px" class="img-responsive"
                                                alt="logo"></a>
            @else
                <div class="row">
                    <!-- <div class="col-md-12 col-sm-12"> -->
                    <a class="site-logo" href="/"><img src="../../assets/frontend/layout/img/logos/logo.png" alt="SakuraShop.VN"></a>
                    <!-- </div> -->
                </div>
            @endif
            <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i><span style="" class="mobi-text">Menu</span></a>

            <div class="row nav-bar g-background">
                <!-- BEGIN CART -->
                <div class="top-cart-block">
                    <div class="top-cart-info">
                        <a href="javascript:void(0);" class="top-cart-info-count">{{{Cart::totalItems()}}} sản phẩm</a>
                        <a href="javascript:void(0);" class="top-cart-info-value">{{{Cart::total(false)}}} VNĐ</a>
                    </div>
                    <i class="fa fa-shopping-cart"></i>

                    <div class="top-cart-content-wrapper">
                        <div class="top-cart-content">
                            <ul data-bind-cart="" class="scroller" style="height: 250px;">
                                @if(count($carts = Cart::contents(true)) > 0)
                                    @foreach($carts as $key => $item)
                                        <li>
                                            <a href=""><img class="image-item-cart"
                                                            src="/images/{{{$item['image']}}}"
                                                            alt="" width="37" height="34"></a>
                                            <span class="cart-content-count">x {{{$item['quantity']}}}</span>
                                            <strong><a href="" class="data-cart-name">{{{$item['name']}}}</a></strong>
                                            <em class="data-cart-price">{{{$item['price']}}}</em>
                                            <form method="post" action="/cart/remove">
                                                <input type="hidden" name="cartid" value="{{$key}}">
                                                {{ Form::submit('', array('class' => 'del-goods')) }}
                                            </form>
                                        </li>
                                    @endforeach
                                @endif()
                            </ul>
                            <ul class="hidden" data-clone-item="">
                                <li>
                                    <a href=""><img class="image-item-cart"
                                                    src="../../assets/frontend/pages/img/cart-img.jpg"
                                                    alt="" width="37" height="34"></a>
                                    <span class="cart-content-count">x 1</span>
                                    <strong><a href="" class="data-cart-name">Rolex Classic Watch</a></strong>
                                    <em class="data-cart-price">$1230</em>
                                    <form method="post" action="/cart/remove">
                                        <input type="hidden" name="cartid" data-cart-id="" value="">
                                        {{ Form::submit('', array('class' => 'del-goods')) }}
                                    </form>
                                    <!-- <a href="javascript:void(0);" class="del-goods">&nbsp;</a> -->
                                </li>
                            </ul>
                            <div class="text-right">
                                <a href="{{URL::to('/cart/view')}}" class="btn btn-default">Xem giỏ hàng</a>
                                <a href="{{URL::to('/orders/create')}}" data-btn-checkout="" class="btn btn-primary">Thanh
                                    toán</a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--END CART -->

                <div class="top-cart-block">
                    <div id="wrapper-top-search">
                        <form id="top-search" method="get" action="/search/">
                            <input type="submit" class="search" value="">
                            <input name="q" id="keyword" type="text" class="text" value="" size="18">
                        </form>
                    </div>
                </div>


                <!-- BEGIN NAVIGATION -->
                <div class="header-navigation">
                    <ul>
                        @foreach(Menu::all() as $menu)
                            @if($menu->target == 'public' || ($menu->target == 'private' && !is_null($authentication->getLoggedUser())))
                                <li><a href="{{{URL::to($menu->link)}}}">{{{$menu->title}}}</a></li>
                                @endif
                                @endforeach
                                        <!-- BEGIN TOP SEARCH -->
                                <!-- END TOP SEARCH -->
                                @if(isset($isMobile))
                                    <?php $categories = admin\Category::loadCategories() ?>
                                    @foreach($categories as $cat)
                                        <li class="list-group-item clearfix
                                        @if(isset($category))
                                        @if($cat->id == $category->id)
                                        active
                                        @endif
                                        @endif">
                                            <a href="{{URL::to("/")}}/danh-muc/{{{$cat->alias}}}">
                                                <i class="fa fa-angle-right"></i>{{{$cat->name}}}
                                                ({{CommonHelper::countCategory($cat->id)}})
                                            </a>
                                        </li>
                                    @endforeach
                                @endif
                    </ul>
                </div>
                <!-- END NAVIGATION -->
            </div>
        </div>
    </div>
    <!-- Header END -->
    <div class="main g-background">
        <div class="container  body-panel">
            @yield('breadcrumb')
            <!-- BEGIN SLIDER -->
            <div class="row margin-bottom-40 ">
                 @include('layouts.slider1')
            </div>
            <!-- BEGIN SIDEBAR & CONTENT -->
            <div class="row margin-bottom-40 ">
                <!-- BEGIN SIDEBAR -->
                @include('layouts.sidebar')
                <!-- END SIDEBAR -->

                <!-- BEGIN CONTENT -->
                <div class="col-md-9 col-sm-8">

                    @yield('main')
                </div>
                <!-- END CONTENT -->
            </div>

            <!-- END SIDEBAR & CONTENT -->
            @include('layouts.promotions')

        </div>
    </div>
    @if((isset($isMobile) && !isset($isTablet)) == true)
        <div class="sidebar list-group-item">
            <h4 class="title-main">Thanh toán</h4>
            <?php echo $shopinfo->shopinfo->store_payment ?>
        </div>
        @endif
                <!-- BEGIN PRE-FOOTER -->
        <div class="pre-footer pre-footer-light g-background">
            <div class="container">
                <div class="row">
                    <!-- BEGIN ABOUT -->
                    <div class="col-md-6 col-sm-6">
                        <div class="footer-about">
                            <div class="text">
                                {{{ $shopinfo->shopinfo->store_address }}}
                                <div class="contact">
                                    <div class="phone"><b>Tel:</b> {{{ $shopinfo->shopinfo->store_tel }}}</div>
                                    <div class="fax"></div>
                                    <div class="email"></div>
                                    <div class="email"></div>
                                </div>
                                <div id="powered">Copyright by {{{$shopinfo->shopinfo->store_name}}} ©
                                    2015
                                </div>
                                <br/>
                                <br/>
                                <br/>
                            </div>
                        </div>
                    </div>
                    <!-- END ABOUT -->
                    @if(!empty($shopinfo->shopinfo->store_map))
                        @if((isset($isMobile) && !isset($isTablet)) == false)
                            <!-- BEGIN MAP -->
                            <div class="col-md-6 col-sm-4 col-xs-12 no-padding-right">
                                <div class="pre-footer-subscribe-box pull-right">
                                    {{--<img class="col-md-12 col-sm-12 col-xs-12" src="{{URL::to('/image/data')}}/{{$shopinfo->shopinfo->store_map}}">--}}
                                </div>
                            </div>
                            <!-- END MAP -->
                        @endif
                    @endif
                </div>
            </div>
        </div>
        <!-- END PRE-FOOTER -->


        <!-- Load javascripts at bottom, this will reduce page load time -->
        @include('layouts.scripts')

        <script type="text/javascript">
            jQuery(document).ready(function () {
                Layout.init();
                $('#top-search').on('submit', function(e) {
                    e.preventDefault();
                    var keyword = $("#keyword").val();
                    window.location = '/search/' + keyword;
                    return false;
                })
            });
        </script>
        <?php echo $shopinfo->shopinfo->store_zopim; ?>
        <!-- END PAGE LEVEL JAVASCRIPTS -->
    </body>
    <!-- END BODY -->
</html>