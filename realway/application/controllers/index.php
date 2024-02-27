<?php

//session_destroy();
$title = "RealWay :: Home";
$all = $database->getQuery("SELECT * FROM users;");
$result = mysqli_fetch_assoc($all);

$faker = Faker\Factory::create();

require_once VIEWS . "/index.tpl.php";

