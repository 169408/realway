<?php

require_once "config/supportfiles.php";

$title = "RealWay :: Home";
$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

print_arr($_POST);
require_once "application/views/index.tpl.php";

