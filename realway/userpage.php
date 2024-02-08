<?php

require_once "database/DatabaseConnection.php";
//require_once "classes/User.php";
require_once "classes/UserManager.php";

$database = new DatabaseConnection();

$title = "RealWay :: User Page";
//$user = new User($database);

$userManager = new UserManager($database);

$users = $userManager->getUsers();
if(isset($_POST) && $_POST != null) {
    $parameters = [];
    foreach ($_POST as $postKey => $postValue) {
        $parameters[$postKey] = $postValue;
    }
    /*if($_POST["form"] == "add") {
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
    }*/
    if($_POST["form"] == "authorisation") {
        $resultingUser = $userManager->authorisationUser($parameters);
        $resultingUser = mysqli_fetch_assoc($resultingUser);
    }
}

require_once "application/views/userpage.tpl.php";

