<?php

use App\Models\Country;

if(!function_exists('getCountries')){
    function getCountries(){
        $countries = Country::all();
        return $countries;
    }
}

