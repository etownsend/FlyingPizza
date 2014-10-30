<?php
//index.php 
require_once 'includes/global.inc.php';
?>

<!DOCTYPE html>
<html lang="en">
	<head>
		<title>Homepage</title>
		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
	</head>
		<body>
		<?php 
			// Show the navbar
			include 'navbar.php';

			// Body to show
			if(isset($_SESSION['logged_in'])) {
				// Logged In
				$user = unserialize($_SESSION['user']); 
				if($user->description == "customer") {
					include 'customer.php';
				}
				if ($user->description == "employee") {
					include 'employee.php';
				}
			} else {
				// Not Logged In
				include 'welcome.php';
			}
		?>

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>