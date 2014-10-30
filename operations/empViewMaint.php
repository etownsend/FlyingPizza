<?php
//empViewMaint.php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require_once '../includes/global.inc.php';
require_once '../includes/employeesOnly.inc.php';

$aircraftID = $_POST['aircraftID'];

// Preparing Statement
$query = "SELECT m.date as entryDate,
				m.maintenanceID as id,
				m.description as descr,
				m.cost as cost,
				u.fname as fname,
				u.lname as lname
		FROM Maintenance m join User u USING(userID)
		WHERE m.aircraftID LIKE(?);";
$params = array($aircraftID);

$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "<table class='table'> 
			<tr>
				<td>Date & Time</td> 
				<td>MaintenanceID</td> 
				<td>Description</td> 
				<td>Cost</td> 
				<td>Performed</td>
				<td>By</td> 
			</tr>";
	foreach($results as $row) {
		echo "<tr>";
		echo "<td>".$row['entryDate']."</td>";
		echo "<td>".$row['id']."</td>";
		echo "<td>".$row['descr']."</td>";
		echo "<td>".$row['cost']."</td>";
		echo "<td>".$row['fname']."</td>";
		echo "<td>".$row['lname']."</td>";
		echo "</tr>";
	}
	echo "</table>";

	if($results === array()) {
		echo "No Results for Aircraft ".$aircraftID;
	}
} else {
	echo "Execution Failure";
}

?>