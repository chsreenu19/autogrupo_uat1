<?php

require_once '../main-config.php';


// Setting up the time zone
date_default_timezone_set('America/Los_Angeles');


// Host Name
$dbhost = EXPLORE_DB_HOST;
$dbname = EXPLORE_DB;
$dbuser = EXPLORE_DB_USERNAME;
$dbpass = EXPLORE_DB_PASSWORD;

// Defining base url
define("BASE_URL", EXPLORE_URL);


define('D_ROOT', EXPLORE_DROOT_FEATURED_CARS_PATH);
//ECHO D_ROOT; exit;
// Getting Admin url
define("ADMIN_URL", BASE_URL . "admin" . "/");

try {
	$pdo = new PDO("mysql:host={$dbhost};dbname={$dbname}", $dbuser, $dbpass);
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
}
catch( PDOException $exception ) {
	echo "Connection error :" . $exception->getMessage();
}