<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";

$database = new DatabaseConnection();
//print_r(DatabaseConnection::getInstance());

$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

$title = "RealWay :: Home";
$user = new User($database);

if($_POST != null) {
    $parameters = ["id" => $_POST["id"], "name" => $_POST["name"], "email" => $_POST["email"], "password" => $_POST["password"], "company" => $_POST["company"]];
    $user->addUser($parameters);
}

require_once "application/views/index.tpl.php";

