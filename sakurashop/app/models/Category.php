<?php
class Category extends \Eloquent {

	/**
    * 
    * 
    * 
    */
    public static function getSubcategory($parent_id, $categories){
        echo '<ul>';
        foreach ($categories as $catChild) {
            if ($catChild->parent_id == $parent_id) {
                echo '<li class="list-group-item category-item clearfix">
                                <a href="'.URL::to("/").'/danh-muc/'.$catChild->alias.'"><i
                                class="fa fa-angle-right"></i>'.$catChild->name.'
                                ('.CommonHelper::countCategory($catChild->id).')</a>';

                Category::getSubcategory($catChild->id, $categories);
                echo '</li>';
            }
        }
        echo '</ul>';
    }

}
