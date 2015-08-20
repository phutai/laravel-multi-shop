<?php
class Promotion extends \Eloquent {

    public static function getPromotion() {
        $slides = DB::table('promotions')
		            ->select('promotions.id', 'promotions.title', 'promotions.image')
		            ->get();
        return $slides;
    }
}
