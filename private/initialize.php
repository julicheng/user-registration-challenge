<?php
ob_start();

define("PRIVATE_PATH", dirname(__FILE__)); 
define("PROJECT_PATH", dirname(PRIVATE_PATH)); 
define("PUBLIC_PATH", PROJECT_PATH . '/public');
define("SHARED_PATH", PRIVATE_PATH . '/shared');

define("WWW_ROOT", '/user-registration-challenge/public');

require_once('database.php');

$db = db_connect(); 

?>