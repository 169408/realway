<?php

require_once "config/Validator.php";

$validator = new Validator();

$rules = [
    "id" => [
        "required" => 1
    ],
    "name" => [
        "required" => 1,
        "min" => 2
    ],
    "email" => [
        "required" => 1,
        "email" => 1
    ],
    "password" => [
        "required" => 1,
        "min" => 5,
        "max" => 21
    ]
];

if(isset($_POST) && $_POST != null) {
    //print_r($_POST);
    $parameters = [];
    foreach ($_POST as $postKey => $postValue) {
        $parameters[$postKey] = $postValue;
    }

    $validation = $validator->validate($parameters, $rules);

    if(!$validation->hasProblems()) {
        //$parameters = ["id" => $_POST["id"], "name" => $_POST["name"], "email" => $_POST["email"], "password" => $_POST["password"], "company" => $_POST["company"], "form" => $_POST["form"]];
        if ($_POST["form"] == "add") {
            $user->addUser($parameters);
        }
        if ($_POST["form"] == "update") {
            $user->updateUser($parameters);
        }
        if ($_POST["form"] == "delete") {
            $user->deleteUser($parameters);
        }
        if ($_POST["form"] == "get") {
            $resultingUser = $user->getUser($parameters);
            $resultingUser = mysqli_fetch_assoc($resultingUser);
        }
        redirect("/index.php");
    } else {
        $errors = $validation->getProblems();
    }
}