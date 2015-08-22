<?php
class Manufacturer extends \Eloquent {

    public static function getManufacturer() {
        $manufacturers = DB::table('manufacturers')
		            ->select('manufacturers.id', 'manufacturers.title', 'manufacturers.image')
		            ->get();
        return $manufacturers;
    }
}
