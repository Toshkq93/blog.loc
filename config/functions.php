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
    $result = [];
    foreach ($arr as $value){
        $result[] = trim(htmlspecialchars(strip_tags($value)));
    }
    return $result;
}