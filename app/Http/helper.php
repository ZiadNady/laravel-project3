<?php

use App\Models\Country;

if(!function_exists('getCountries')){
    function getCountries(){
        $countries = Country::all();
        return $countries;
    }
}

if (!function_exists('uploaded_asset')) {
    function uploaded_asset($id)
    {
        // if (($asset = \App\Models\Upload::find($id)) != null) {
        //     return my_asset($asset->file_name);
        // }
        return null;
    }
}

if (!function_exists('get_setting')) {
    function get_setting($proprty)
    {
        return env($proprty, 'Laravel');
    }
}


