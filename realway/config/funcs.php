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