<?php

require_once CONFIG . "/funcs.php";
require_once VENDOR . "/autoload.php";
require_once DATABASE . "/DatabaseConnection.php";
require_once CLASSES . "/User.php";
require_once CLASSES . "/UserManager.php";
require_once CLASSES . "/Post.php";

$database = new DatabaseConnection();
$user = new User($database);
$userManager = new UserManager($database);
$post = new Post($database);

session_start();
if(!empty($_SESSION)) {
    foreach ($_SESSION as $sesskey => $sessvalue) {
        if(!isset($_POST[$sesskey])) {
            $_POST[$sesskey] = $sessvalue;
        }
    }
}
//print_arr($_POST);


require_once CONFIG . "/validcheck.php";
