<?php

session_start();
if(!empty($_SESSION)) {
    foreach ($_SESSION as $sess_key => $sess_value) {
        $_POST[$sess_key] = $sess_value;
    }
}
//require_once "config/supportfiles.php";

$title = "RealWay :: Add Post";
$_POST["form"] = "newPost";
/*if(isset($_POST) && $_POST["form"] == "newPost") {
    $id = $_POST["post_id"];
    $image = $_FILES["image"];

    if($validator->postImageSecurity($image)) {
        $post->loadPostImage($image, $id);
        $comm = "OK";
    } else {
        dd("Error with load post image");
    }
}*/

require_once VIEWS . "/post.tpl.php";