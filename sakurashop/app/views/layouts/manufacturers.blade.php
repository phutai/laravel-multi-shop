<div class="brands">
    <div class="container">
        <div class="owl-carousel owl-carousel6-brands">
            <?php 
              $manufacturers = Manufacturer::getManufacturer();
            ?>

            @foreach ($manufacturers as $key => $value)
                <a href="{{URL::to("/")}}/manufacturer/{{{$value->id}}}"><img src="{{URL::to("/")}}/image/manufacturer/{{$value->image}}" alt="{{$value->title}}" title="{{$value->title}}"></a>
            @endforeach
        </div>
    </div>
</div>