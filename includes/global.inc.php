<?php
//global.inc.php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);

require_once dirname(__FILE__).'/../classes/User.class.php';
require_once dirname(__FILE__).'/../classes/UserTools.class.php';
require_once dirname(__FILE__).'/../classes/DB.class.php';


//connect to the database
$db = new DB();

//initialize UserTools object
$userTools = new UserTools();

//start the session
session_start();

//refresh session variables if logged in
if(isset($_SESSION['logged_in'])) {
	$user = unserialize($_SESSION['user']);
	$_SESSION['user'] = serialize($userTools->get($user->userID));
}
?>