<?php

require_once "config/supportfiles.php";

$title = "RealWay :: Authorisation";
session_start();
print_arr($_SESSION);
unset($_SESSION);
session_destroy();

require_once "application/views/auth.tpl.php";
