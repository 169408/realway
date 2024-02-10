<?php

function dump($data) {
    echo "<pre>";
    var_dump($data);
    echo "</pre>";
}

function dd($data) {
    dump($data);
    die;
}

function print_arr($data) {
    echo "<pre>";
    print_r($data);
    echo "</pre>";
}

function old($fieldname, $form) {
    if(isset($_POST[$fieldname])) {
        if($_POST["form"] == $form) {
            return transformstr($_POST[$fieldname]);
        }
    }
    return "";
}

function redirect($url = "") {
    if($url) {
        $redirect = $url;
    } else {
        $redirect = isset($_SERVER["HTTP_REFERER"]) ? $_SERVER["HTTP_REFERER"] : "realway/index.php";
    }
    header("Location: {$redirect}");
    die;
}

function transformstr($str) {
    return htmlspecialchars($str, ENT_QUOTES);
}