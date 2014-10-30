<?php
//customersOnly.inc.php

require_once dirname(__FILE__).'/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

if($user->description != "employee") {
	header("Location: index.php");
}

?>