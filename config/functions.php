<?php
function debug($arr , $die = false){
    echo '<pre>' . print_r($arr, true) . '</pre>';
    if ($die) die;
}
function redirect($http = ''){
    if($http){
        $redirect = $http;
    }else{
        $redirect = isset($_SERVER['HTTP_REFERER']) ? $_SERVER['HTTP_REFERER'] : PATH;
    }
    header("Location: $redirect");
    exit;
}

function removeHtml($arr){
    for ($i = 0; $i <= count($arr); $i++){
        $arr[$i] = htmlspecialchars($arr[$i]);
        $arr[$i] = trim($arr[$i]);
        $arr[$i] = strip_tags($arr[$i]);
    }
    return $arr;
}