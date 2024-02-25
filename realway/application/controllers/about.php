<?php

$title = "RealWay :: About";
$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

require_once VIEWS . "/about.tpl.php";
