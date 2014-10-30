<?php
//custLocAdd.php

require_once '../includes/global.inc.php';
require_once '../includes/customersOnly.inc.php';

// Get info from session
$user = unserialize($_SESSION['user']);
$userID = $user->userID;

// Get info from input
$address = $_POST['address'];
$gps = $_POST['gps'];
$nickname = $_POST['nickname'];

// Preparing Statement
$query = "INSERT INTO Location 
		(userID, locationName, address, gpsCoord)
		VALUES
		(?, ?, ?, ?);";
$params = array($userID, $address, $gps, $nickname);

if($db->executeQuery($query, $params) !== false) {
	echo "Location Added Successfuly";
} else {
	echo "Execution Failure";
}

?>