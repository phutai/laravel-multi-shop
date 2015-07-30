@if((isset($isMobile) && !isset($isTablet)) == false)
<div class="sidebar col-md-3 col-sm-4">
        <!-- slide two start -->
        <div class="col-md-12 shop-index-carousel">
            <br>
            <div class="sidebar">
                <h4 class="title-main">Hàng mới về</h4>
            </div>


            <div class="content-slider">
                <div id="myCarousel" class="carousel slide" data-ride="carousel">
                    <!-- Indicators -->
                    <?php $newProduct = \admin\Product::newProduct() ?>
                    <ol class="carousel-indicators hidden">
                        @foreach($newProduct as $key => $value)
                            <li data-target="#myCarousel" data-slide-to="{{$key}}" class="
                        @if($key == 0) active @endif
                                    "></li>
                        @endforeach
                    </ol>
                    <div class="carousel-inner">
                        @foreach($newProduct as $k => $pr)
                            <div class="item @if($k == 0)
                        active
                        @endif">
                                <div class="product-item gray-background new-product">
                                    <a title="{{{$pr['name']}}}" href="{{URL::to("/")}}/san-pham/{{{ $pr['alias'] }}}">
                                        <div class="pi-img-wrapper">
                                            <img src="{{URL::to("/images/cache/")}}/{{Config::get('configs.thumb_image')}}/{{{$pr['image']}}}"
                                                 class="img-responsive">
                                        </div>
                                      
<div class="product-box-info">
                            <p class="name-product">Mã số : <b>{{{$pr['model'] }}}</b><br/>Tên : {{{ Str::limit($pr['name'], 32)  }}}</p>

                        </div>
                    <div class="pi-price">{{ CommonHelper::displaySalePriceArray($pr) }}</div>
                                    </a>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        <div class="clearfix"></div>
        <div class="clearfix"></div><br/><br/>
        <div id="cssmenu">
        <ul class="list-group margin-bottom-25 sidebar-menu">
            <li class="list-group-item category-item clearfix"><h4>Chọn danh mục</h4></li>
            <?php 
                $categories = admin\Category::loadCategories();

                function getSubcategory($parent_id, $categories){
                    echo '<ul>';
                    foreach ($categories as $catChild) {
                        if ($catChild->parent_id == $parent_id) {
                            echo '<li class="list-group-item category-item clearfix
                                @if(isset($category))
                                @if($catChild->id == $category->id)
                                active
                                @endif
                            @endif
                                    "><a href="'.URL::to("/").'/danh-muc/'.$catChild->alias.'"><i
                                            class="fa fa-angle-right"></i>'.$catChild->name.'
                                    ('.CommonHelper::countCategory($catChild->id).')</a>';
                            getSubcategory($catChild->id, $categories);
                            echo '</li>';
                        }
                    }
                    echo '</ul>';
                }

                foreach ($categories as $cat) {
                    echo '<li class="list-group-item category-item clearfix
                        @if(isset($category))
                        @if($cat->id == $category->id)
                        active
                        @endif
                    @endif
                            "><a href="'.URL::to("/").'/danh-muc/'.$cat->alias.'"><i
                                    class="fa fa-angle-right"></i>'.$cat->name.'
                            ('.CommonHelper::countCategory($cat->id).')</a>';
                    getSubcategory($cat->id, $categories);
                    echo '</li>';
                }



            ?>
        </ul>
        </div>
        <div style="clear: both"></div>
        <div class="sidebar list-group-item">
            <h4 class="title-main">Thanh toán</h4>
            <?php echo $shopinfo->shopinfo->store_payment ?>
        </div>
</div>
@endif
