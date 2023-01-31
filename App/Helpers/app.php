<?php 

function assets($assetName){
    return URL."/public/".$assetName;
}

function redirect($url,$time=0){
    $url = URL."/".$url;

    if($time==0){
        header("Location:{$url}");
    }
    else{
        header("Refresh:{$time}; url={$url} ");
    }
}

function requestLink($request=null){
    return URL."/".$request;
}

function sess($name){
    return \Core\Session::getSession($name);
}

function isEmpty($par){
    $par =trim(stripslashes(strip_tags($par)));

    return $par =="" || $par==null; 
}