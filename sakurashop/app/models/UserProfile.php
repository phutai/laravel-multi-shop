<?php

/**
 * Created by PhpStorm.
 * User: Nguyen
 * Date: 1/6/2015
 * Time: 1:27 AM
 */
class UserProfile extends Eloquent
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'user_profile';
    protected $guarded = array();

    public function user() {
        return $this->belongsTo('User');
    }
}