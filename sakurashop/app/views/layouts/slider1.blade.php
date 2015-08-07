<div class="col-md-12 sale-product">
  <h2>Thương hiệu nổi bật</h2>
  <div class="owl-carousel owl-carousel5">
    <?php 
      $slides = Slide::getSlider('Top');
    ?>
    @foreach ($slides as $key => $value)
        <div>
          <div class="product-item">
            <div class="pi-img-wrapper">
              <img src="{{URL::to("/")}}/image/slider/{{$value->image}}" class="img-responsive" alt="Berry Lace Dress" style="margin:auto">
            </div>
          </div>
        </div>
    @endforeach
  </div>
</div>