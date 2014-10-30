<?php
//empProduce.php

require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

// Get info from session
$user = unserialize($_SESSION['user']);
$userID = $user->userID;

// Get info from input
$ticketID = $_POST['ticketID'];
$itemID = $_POST['itemID'];

// Preparing Statement
$query = "UPDATE OrderedItem SET userID = ?
		WHERE ticketID = ? AND itemID = ?
		ORDER BY orderedItemID LIMIT 1;";
$params = array($userID, $ticketID, $itemID);

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "Production Successful";
} else {
	echo "Execution Failure";
}

?>