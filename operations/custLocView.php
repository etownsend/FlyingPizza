<?php
//custLocView.php

require_once '../includes/global.inc.php';
require_once '../includes/customersOnly.inc.php';

// Get info from session
$user = unserialize($_SESSION['user']);
$userID = $user->userID;

// Preparing Statement
$query = "SELECT	l.locationName as nick,
					l.gpsCoord as gps,
					l.address as address
			FROM Location l join User u USING(userID)
			WHERE u.userID = ?;";
$params = array($userID);

$results = $db->executeQuery($query, $params);
if($results !== false) {
	if ($results === array()) { 
		echo "No Locations Available";
	} else {
		echo "<table class='table'> <tr> <td>Name</td> <td>Coordinates</td> <td>Addresss</td> </tr>";
		foreach($results as $row) {
			echo "<tr>";
			echo "<td>".$row['nick']."</td>";
			echo "<td>".$row['gps']."</td>";
			echo "<td>".$row['address']."</td>";
			echo "</tr>";
		}
		echo "</table>";
	}
} else {
	echo ("Execution Failure");
}

?>