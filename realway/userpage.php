<?php

session_start();
if(!empty($_SESSION)) {
    var_dump($_SESSION);
    $_POST = $_SESSION;
    $_POST["form"] = "authorisation";
}

require_once "config/supportfiles.php";

if (isset($errors) || $resultingUser == null) {
    header("Location: auth.php", true, 307);
    die;
}

session_destroy();
session_start();
foreach ($resultingUser as $key => $value) {
    $_SESSION["$key"] = $value;
}

$activeuser = true;

require_once "application/views/userpage.tpl.php";

