<?php

require_once "config/supportfiles.php";

$title = "RealWay :: User Page";

if (isset($errors) || $resultingUser == null) {
    header("Location: auth.php", true, 307);
    die;
}

require_once "application/views/userpage.tpl.php";

