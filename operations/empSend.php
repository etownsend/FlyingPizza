<?php
//empSend.php

require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

// Get info from input
$ticketID = $_POST['ticketID'];
$aircraftID = $_POST['aircraftID'];

// Preparing Statement
$query = "INSERT INTO Flight (ticketID, departTime, deliveryTime, returnTime, aircraftID)
					VALUES (?, NOW(), NULL, NULL, ?);";
$params = array($ticketID, $aircraftID);

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "Sending Order Confirmed";
} else {
	echo "Execution Failure";
}

?>