<?php
//empUnmade.php

require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

// Preparing Statement
$query = "SELECT o.itemID as itemID, o.ticketID as ticketID
		FROM OrderedItem o
		Where o.userID IS NULL;";
$params = array();

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "<table class='table'> <tr> <td>itemID</td> <td>ticketID</td> </tr>";
	foreach($results as $row) {
		echo "<tr>";
		echo "<td>".$row['itemID']."</td>";
		echo "<td>".$row['ticketID']."</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "Execution Failure";
}

?>
