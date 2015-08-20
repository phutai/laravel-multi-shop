<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <?php 
              $promotions = Promotion::getPromotion();
            ?>

            @foreach ($promotions as $key => $value)
                <a href=""><img src="{{URL::to("/")}}/image/promotion/{{$value->image}}" alt="{{$value->title}}" title="{{$value->title}}"></a>
            @endforeach
        </div>
    </div>
</div>