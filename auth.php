<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";

$database = new DatabaseConnection();

$title = "RealWay :: Authorisation";
$user = new User($database);

require_once "config/validcheck.php";

$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

require_once "application/views/auth.tpl.php";
