<?php

use Illuminate\Support\Facades\Auth;

class Navigation
{
    public static function isActiveRoute($route, $output = 'active')
    {
        if (Route::currentRouteName() == $route) {
            return $output;
        }
    }
}

class SisHelper
{
    public static function  saveUserData( $object)
    {
        $user = Auth::user()->id;
        if( is_object( $object)){
            $object->user_created_id = $user->id;
            $object->user_modified_id = $user->id;
        }
        return $object;

    }

}
