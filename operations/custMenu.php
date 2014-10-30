<?php
//custLocMenu.php

require_once '../includes/global.inc.php';
require_once '../includes/customersOnly.inc.php';

ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
$min = $_POST['min'];
$max = $_POST['max'];

// Preparing Statement
if (empty($min)) {
	$min = 0;
}
$query = "SELECT i.itemID as id,
				i.price as price,
				i.itemName as name,
				i.description as descr
		FROM 
			Item i
		WHERE
			price >= ?";
if (!empty($max)) {
	$query = $query ." AND price < ?;";
} else {
	$query = $query . ";";
}
$params = array($min);
if (!empty($max)) {
	$params = array($min, $max);
}

$results = $db->executeQuery($query, $params);

if($results !== false) {
	echo "<table class='table'> <tr> <td>Price</td> <td>Name</td> <td>Description</td> </tr>";
	foreach($results as $row) {
		echo "<tr>";
		echo "<td>".$row['price']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['descr']."</td>";
		echo "</tr>";
	}
	echo "</table>";
} else {
	echo "Execution Failure";
}