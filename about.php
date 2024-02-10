<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";

$database = new DatabaseConnection();

$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

$title = "RealWay :: About";

require_once "application/views/about.tpl.php";
