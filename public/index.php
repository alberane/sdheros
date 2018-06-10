<?php
// PHP Error level
error_reporting(E_ALL);
ini_set('display_errors','On');

require_once __DIR__."/../config/routes.php";

$app->run();