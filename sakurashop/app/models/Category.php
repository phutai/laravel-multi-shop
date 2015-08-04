<?php
class Category extends \Eloquent {

	/**
    * 
    * 
    * 
    */
    public static function getSubcategory($parent_id, $categories) {
        echo '<ul>';
        foreach ($categories as $catChild) {
            if ($catChild->parent_id == $parent_id) {
                $childString = '<li class="list-group-item category-item clearfix">
                                <a href="'.URL::to("/").'/danh-muc/'.$catChild->alias.'"><i
                                class="fa fa-angle-right"></i>'.$catChild->name;
                if (Category::checkChild($catChild->id) > 0) {
                    $childString = $childString.'<i class="fa fa-angle-double-right"></i>';
                }
                $childString = $childString.'</a>';
                echo $childString;
                Category::getSubcategory($catChild->id, $categories);
                echo '</li>';
            }
        }
        echo '</ul>';
    }

    public static function checkChild($parent_id) {
        $child = DB::table('categories')
                    ->select(DB::raw('count(*) as childCount'))
                    ->where('parent_id', '=', $parent_id)
                    ->first();
        return $child->childCount;
    }

}
