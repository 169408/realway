<?php

require_once CONFIG . "/Validator.php";

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
    if(isset($_SESSION)) {
        if (trim(parse_url($_SERVER["REQUEST_URI"])["path"], "/") != "auth") {
            $activeuser = true;
        }
    }
    //print_r($_POST);
    $parameters = [];
    foreach ($_POST as $postKey => $postValue) {
        $parameters[$postKey] = $postValue;
    }

    $validation = $validator->validate($parameters, $rules);

    if(!$validation->hasProblems() && isset($_POST["form"])) {
        //$parameters = ["id" => $_POST["id"], "name" => $_POST["name"], "email" => $_POST["email"], "password" => $_POST["password"], "company" => $_POST["company"], "form" => $_POST["form"]];
        if ($_POST["form"] == "add") {
            $user->addUser($parameters);
            redirect("/index");
        }
        if ($_POST["form"] == "update") {
            $user->updateUser($parameters);
            redirect("/index");
        }
        if ($_POST["form"] == "delete") {
            $user->deleteUser($parameters);
            redirect("/index");
        }
        if ($_POST["form"] == "get") {
            $resultingUser = $user->getUser($parameters);
            $resultingUser = mysqli_fetch_assoc($resultingUser);
        }
        if($_POST["form"] == "authorisation") {
            $resultingUser = $userManager->authorisationUser($parameters);
            $resultingUser = mysqli_fetch_assoc($resultingUser);
            $verification = 1;
            if($resultingUser != null) {
                $verification = 0;
            }
            //echo $verification;
        }
        if($_POST["form"] == "newPost") {
            if(isset($_FILES["image"]) && $_FILES["image"]["name"] != "") {
                echo "tufta";
                $newImage = "";
                $image = $_FILES["image"];

                if($validator->postImageSecurity($image)) {
                    $newImage = $post->loadPostImage($image);
                    $comm = "OK";
                } else {
                    dd("Error with load post image");
                }
                $parameters["image"] = $newImage;
            }
            if(isset($_POST["post_id"]) && $_POST["post_id"] != "") {
                $parameters["post_id"] = $_POST["post_id"];
                $post->updatePost($parameters);
            } else {
                $post->addPost($parameters);
            }
            redirect("/userpage");
        }
    } else {
        $errors = $validation->getProblems();
        //print_arr($_POST);
        print_arr($errors);
    }
}