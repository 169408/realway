<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";
require_once "config/funcs.php";

$database = new DatabaseConnection();

$title = "RealWay :: Home";
$user = new User($database);

require_once "config/validcheck.php";

$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

require_once "application/views/index.tpl.php";

