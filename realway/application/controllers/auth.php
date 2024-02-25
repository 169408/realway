<?php

$title = "RealWay :: Authorisation";
session_start();
unset($_SESSION);
session_destroy();

require_once VIEWS . "/auth.tpl.php";
