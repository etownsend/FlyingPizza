<?php
//empUnsent.php

require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

// Preparing Statement
$query = "SELECT t.ticketID as ticketID
		FROM Ticket t left join Flight f USING(ticketID)
		WHERE f.flightID is NULL;";
$params = array();

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "<table class='table'> <tr> <td>ticketID</td></tr>";
	foreach($results as $row) {
		echo "<tr><td>".$row['ticketID']."</td></tr>";
	}
	echo "</table>";
} else {
	echo "Execution Failure";
}

?>	 