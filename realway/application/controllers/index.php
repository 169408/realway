<?php

//session_destroy();

$title = "RealWay :: Home";
$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

//print_arr($_POST);
$faker = Faker\Factory::create();
//echo $faker->firstName();
require_once VIEWS . "/index.tpl.php";

