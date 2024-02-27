<?php

//require_once "config/supportfiles.php";

if (isset($errors) || $resultingUser == null) {
    header("Location: auth", true, 307);
    die;
}

session_destroy();
session_start();
foreach ($resultingUser as $key => $value) {
    $_SESSION["$key"] = $value;
}
$_SESSION["form"] = "authorisation";

$title = "Realway :: User Page";
$posts = $database->fulfilQuery("SELECT * FROM posts WHERE user_id = ?", [$resultingUser["id"]]);

require_once VIEWS . "/userpage.tpl.php";

