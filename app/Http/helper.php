<?php

use App\Models\Country;
use App\Models\Pharmacy;
use App\Models\Product;

if (!function_exists('getCountries')) {
    function getCountries()
    {
        $countries = Country::all();
        return $countries;
    }
}

if (!function_exists('getPharmacies')) {
    function getPharmacies()
    {
        $pharmacies = Pharmacy::all();
        return $pharmacies;
    }
}
if (!function_exists('getProducts')) {
    function getProducts()
    {
        $products = Product::all();
        return $products;
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



//filter products based on vendor activation system
if (!function_exists('filter_products')) {
    function filter_products($products)
    {
        return $products;
    }
}


if (!function_exists('get_setting')) {
    function get_setting($proprty)
    {
        return env($proprty, 'Laravel');
    }
}
if (!function_exists('custom_route')) {
    function custom_route($name, $parameters = [], $absolute = true, $iconstyle, $method)
    {
        $url =  route($name, $parameters, $absolute);
        $form = '<form action="' . $url . '" method="POST">';
        $form .= csrf_field();
        $form .= $method;
        $form .= '<button type="submit" style=" background: none;
        border: none;
        cursor: pointer; " > <i class="'.$iconstyle.'"></i></button> ';
        $form .= '</form>';
        return $form;
    }
}
if (!function_exists('delete_route')) {
    function delete_route($name, $parameters = [], $absolute = true)
    {
        return custom_route($name, $parameters, $absolute,'fa-solid fa-trash',method_field('DELETE'));
    }
}
