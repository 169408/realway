<?php

$title = "RealWay :: Edit Profile";

if(isset($_POST["form"]) && $_POST["form"] == "changeAvatar") {
    echo "im here";
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

require_once VIEWS . "/edituser.tpl.php";
