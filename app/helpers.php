<?php

function get_option($key)
{
    $result = DB::table('options')->select('option_value')->where('option_name', $key)->first();
    if ($result) {
        return $result->option_value;
    }
}

function get_category_info($category_id)
{
    $result=DB::table('category')->select('category_title','category_name')->where('category_id',$category_id)->first();

    if($result){
        return $result;

    }
}

function single_product_information($product_id)
{
    $result=DB::table('product')->select('sku','product_name')->where('product_id',$product_id)->first();

    if($result){
        return $result;

    }
}


function get_single_option()
{
    $result = DB::table('deafult_seating')->where('default_setting_id','=',1)->first();
    if ($result) {
        return $result;
    }
}


?>
