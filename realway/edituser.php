<?php

require_once "config/supportfiles.php";

$title = "RealWay :: Edit Profile";

session_start();
if(isset($_POST) && $_POST["form"] == "changeAvatar") {
    $id = $_POST["id"];
    $avatar = $_FILES["avatar"];

    if($validator->avatarSecurity($avatar)) {
        $user->loadUserAvatar($avatar, $id);
        $comm = "OK";
    } else {
        dd("Error with load user avatar");
    }
}
$activeuser = true;
$resultingUser = $_SESSION;

require_once "application/views/edituser.tpl.php";
