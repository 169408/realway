<?php

require_once dirname(__DIR__) . "/config/constants.php";
require_once CONFIG . "/supportfiles.php";
require_once CONFIG . "/Router.php";
$router = new Router($_SERVER["REQUEST_URI"]);

require_once  $router->showview();