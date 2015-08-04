<?php $authentication = \App::make('authenticator'); ?>
<!-- BEGIN SIDEBAR -->
<div class="page-sidebar-wrapper">
    <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
    <!-- DOC: Change data-auto-speed="200" to adjust the sub menu slide up/down speed -->
    <div class="page-sidebar navbar-collapse collapse">
        <!-- BEGIN SIDEBAR MENU -->
        <!-- DOC: Apply "page-sidebar-menu-light" class right after "page-sidebar-menu" to enable light sidebar menu style(without borders) -->
        <!-- DOC: Apply "page-sidebar-menu-hover-submenu" class right after "page-sidebar-menu" to enable hoverable(hover vs accordion) sub menu mode -->
        <!-- DOC: Apply "page-sidebar-menu-closed" class right after "page-sidebar-menu" to collapse("page-sidebar-closed" class must be applied to the body element) the sidebar sub menu mode -->
        <!-- DOC: Set data-auto-scroll="false" to disable the sidebar from auto scrolling/focusing -->
        <!-- DOC: Set data-keep-expand="true" to keep the submenues expanded -->
        <!-- DOC: Set data-auto-speed="200" to adjust the sub menu slide up/down speed -->
        <ul class="page-sidebar-menu page-sidebar-menu-hover-submenu " data-keep-expanded="false"
            data-auto-scroll="true" data-slide-speed="200">
            <li class="start active ">
                <a href="{{URL::route('admin.stores.index')}}">
                    <i class="icon-home"></i>
                    <span class="title">Dashboard</span>
                    <span class="selected"></span>
                </a>
            </li>
            <li>
                <a href="{{{URL::to('/admin/orders/')}}}">
                    <i class="icon-basket"></i>
                    Đơn hàng</a>
            </li>
            <?php
            //print_r($authentication->getLoggedUser()->permissions);die;
             ?>
            @if(array_key_exists('_shopadmin', $authentication->getLoggedUser()->permissions))
            <li>
                <a href="{{URL::route('admin.categories.index')}}">
                    <i class="icon-handbag"></i>
                    Danh mục</a>
            </li> 
              <li>
                <a href="{{URL::route('admin.products.index')}}">
                    <i class="icon-handbag"></i>
                    Sản phẩm</a>
            </li>              
            <li>
                <a href="{{URL::route('admin.shopinfos.index')}}">
                    <i class="icon-home"></i>
                    Gian hàng</a>
            </li>
            <li>
                <a href="javascript:;">
                <i class="icon-present"></i>Tùy chọn
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{URL::route('admin.options.index')}}">
                        Loại tùy chọn</a>
                    </li>
                    <li>
                        <a href="{{URL::route('admin.optionvalues.index')}}">
                        Giá trị tùy chọn</a>
                    </li>
                </ul>
            </li>
            <li>
                <a href="{{URL::to('/admin/users/dashboard')}}">
                    <i class="icon-home"></i>
                    Người dùng
                <span class="arrow "></span>
                </a>
                <ul class="sub-menu">
                    <li>
                        <a href="{{URL::to('/admin/users/dashboard')}}">
                           Quản lý người dùng</a>
                    </li>
                    <li>
                        <a href="{{URL::to('/admin/createMail')}}">
                            Gủi mail thông báo</a>
                    </li>
                </ul>
            </li>
            @endif
             @if(array_key_exists('_superadmin', $authentication->getLoggedUser()->permissions))
              <li>
                <a href="{{URL::route('admin.shopinfos.index')}}">
                    <i class="icon-home"></i>
                    Gian hàng</a>
            </li>              
            @endif
            @if(array_key_exists('_superadmin', $authentication->getLoggedUser()->permissions))
                <li>
                    <a href="{{URL::route('admin.sliders.index')}}">
                    <i class="icon-home"></i>
                    Sliders</a>
                </li>      
                <li>
                    <a href="{{URL::route('admin.slides.index')}}">
                    <i class="icon-home"></i>
                    Slides</a>
                </li> 
                <li>
                    <a href="{{URL::route('admin.posts.index')}}">
                    <i class="icon-home"></i>
                    Posts</a>
                </li>             
            @endif
        </ul>
        <!-- END SIDEBAR MENU -->
    </div>
</div>
<!-- END SIDEBAR -->