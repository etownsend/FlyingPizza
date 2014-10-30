<?php
//custPlaceOrder.php
ini_set('display_errors', 'On');
error_reporting(E_ALL | E_STRICT);
require_once '../includes/global.inc.php';
require_once '../includes/customersOnly.inc.php';

// Get info from session
$user = unserialize($_SESSION['user']);
$userID = $user->userID;

// Get info from input
$location = $_POST['location'];
$item1 = $_POST['item1'];
$item2 = $_POST['item2'];
$item3 = $_POST['item3'];

// Adding Order
$query = "INSERT INTO Ticket (userID, locationName)
		VALUES (?, ?)";
$params = array($userID, $location);
$results = $db->executeQuery($query, $params);
if($results !== false) {
	echo "Order Added Successfully<br>";
} else {
	echo "Execution Failure";
}
$ticketID = $db->getLastInsertID();

// Adding Items
$itemsArray = array ($item1, $item2, $item3);

foreach($itemsArray as $item) {
	if ($item === '') continue;
	// Getting information about items
	$query = "SELECT i.price as price, i.itemID as id FROM Item i WHERE i.itemName LIKE(?);";
	$params = array($item);

	$results = $db->executeQuery($query, $params);
	if($results !== false) {
		//echo "Item Added Successfully";
	} else {
		echo "Unrecognized Item: ".$item."<br>";
		continue;
	}
	$itemPrice = $results[0]['price'];
	$itemID = $results[0]['id'];
	
	// Adding items to queue
	$query = "INSERT INTO OrderedItem(ticketID, itemID, registerCost)
			VALUES (?, ?, ?);";
	$params = array($ticketID, $itemID, $itemPrice);
	
	$results = $db->executeQuery($query, $params);
	if($results !== false) {
		echo "Item: ".$item."<br>";
	} else {
		echo "Execution Failure<br>";
	}
}
?> 