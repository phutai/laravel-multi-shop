<div class="col-md-12 sale-product">
  <h2>Thương hiệu nổi bật</h2>
  <div class="owl-carousel owl-carousel5">
    <?php 
      $slidersID = admin\Slider::loadSlidersTop();
      $slides = admin\Slide::loadSlides(); 
      ?>
    @foreach ($slides as $key => $value)
      @if ($value->sliders_id == $slidersID)
        <div>
          <div class="product-item">
            <div class="pi-img-wrapper">
              <img src="{{URL::to("/")}}/image/slider/{{$value->image}}" class="img-responsive" alt="Berry Lace Dress" style="margin:auto">
            </div>
          </div>
        </div>
      @endif
    @endforeach
  </div>
</div>