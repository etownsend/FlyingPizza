<?php
//empFileMaint.php

require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

// Get info from session
$user = unserialize($_SESSION['user']);
$userID = $user->userID;

// Get info from input
$description = $_POST['description'];
$cost = $_POST['cost'];
$date = $_POST['date'];
$aircraftID = $_POST['aircraftID'];

// Preparing Statement
$query = "INSERT INTO Maintenance (description, cost, date, aircraftID, userID)
					VALUES (?, ?, ?, ?, ?);";
$params = array($description, $cost, $date, $aircraftID, $userID);

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "Report Successfully Filed";
} else {
	echo "Execution Failure";
}

?>