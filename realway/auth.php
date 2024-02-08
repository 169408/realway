<?php

require_once "database/DatabaseConnection.php";
require_once "classes/User.php";

$database = new DatabaseConnection();

$title = "RealWay :: Home";
$user = new User($database);

if(isset($_POST) && $_POST != null) {
    //print_r($_POST);
    $parameters = [];
    foreach ($_POST as $postKey => $postValue) {
        $parameters[$postKey] = $postValue;
    }
    //$parameters = ["id" => $_POST["id"], "name" => $_POST["name"], "email" => $_POST["email"], "password" => $_POST["password"], "company" => $_POST["company"], "form" => $_POST["form"]];
    if($_POST["form"] == "add") {
        $user->addUser($parameters);
    }
    if($_POST["form"] == "update") {
        $user->updateUser($parameters);
    }
    if($_POST["form"] == "delete") {
        $user->deleteUser($parameters);
    }
    if($_POST["form"] == "get") {
        $resultingUser = $user->getUser($parameters);
        $resultingUser = mysqli_fetch_assoc($resultingUser);
    }
}

$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

require_once "application/views/auth.tpl.php";
