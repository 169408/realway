<?php

require_once "config/funcs.php";
require_once "database/DatabaseConnection.php";
require_once "classes/User.php";
require_once "classes/UserManager.php";

$database = new DatabaseConnection();
$user = new User($database);
$userManager = new UserManager($database);

require_once "config/validcheck.php";
