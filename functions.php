<?php

function redirect($url){
    header("Location: $url");
    die();
}

function toUtf8($x){
    if(mb_detect_encoding($x)=='UTF-8' && mb_check_encoding($x,'UTF-8'))
        return $x;
    else
        return utf8_encode($x);
}
function utf8_encode_all($dat){
    if (is_string($dat)) return toUtf8($dat);
    if (!is_array($dat)) return $dat;
    $ret = array();
    foreach($dat as $i=>$d) $ret[$i] = utf8_encode_all($d);
    return $ret;
}

function responseOk($resp){
    $tmp['success'] = true;
    $tmp['response'] = $resp;
    die(json_encode(utf8_encode_all($tmp)));
}

function responseError($message,$code){
    $tmp['success'] = false;
    $tmp['message'] = $message;
    $tmp['code'] = $code;
    die(json_encode(utf8_encode_all($tmp)));
}