<?php
class Slide extends \Eloquent {

    public static function getSlider($positison) {
        $slides = DB::table('slides')
		            ->join('sliders', 'slides.sliders_id', '=', 'sliders.id')
		            ->select('slides.id', 'slides.image', 'slides.link')
		            ->where('sliders.positison', '=', $positison)
		            ->get();
        return $slides;
    }
}
