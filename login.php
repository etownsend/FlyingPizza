<?php
//login.php

require_once 'includes/global.inc.php';

$error = "";
$username = "";
$password = "";

//check to see if they've submitted the login form
if(isset($_POST['submit-login'])) { 

	$username = $_POST['username'];
	$password = $_POST['password'];

	$userTools = new UserTools();
	if($userTools->login($username, $password)){ 
		//successful login, redirect them to a page
		header("Location: index.php");
	}else{
		$error = "Incorrect username or password. Please try again.";
	}
}
?>

<html>
	<head>
		<title>Login</title>

		<meta name="viewport" content="width=device-width, initial-scale=1.0">
		<!-- Bootstrap -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
		<!-- Custom styles for this template -->
	<link href="css/login.css" rel="stylesheet">
	</head>
	<body>
		<?php
		// Add the navbar
		include 'navbar.php';
		?>

		<div class="container">
			<?php
				if($error != "") {
					echo '<div class="alert alert-danger alert-dismissible" role="alert">
							<button type="button" class="close" data-dismiss="alert">
								<span aria-hidden="true">&times;</span>
								<span class="sr-only">Close</span>
							</button>'.
							$error.
						'</div>';
				}
			?>
			
			<form class="form-signin" role="form" action="login.php" method="post">
				<h2 class="form-signin-heading">Please Log In</h2>
				<input type="username" name="username" value="<?php echo $username; ?>" class="form-control" placeholder="Username" required autofocus>
				<input type="password"  name="password" value="<?php echo $password; ?>" class="form-control" placeholder="Password" required>
				<button class="btn btn-lg btn-primary btn-block" name="submit-login" type="submit">Log In</button>
			</form>

			<div class="panel panel-default">
					<div class="panel-heading">Testing Accounts</div>
					<div class="panel-body">
						<table class="table">
							<tr><td><strong>Username</strong></td><td><strong>Password</strong></td></tr>
							<tr><td>guestCustomer</td><td>guest</td></tr>
							<tr><td>guestEmployee</td><td>guest</td></tr>
						</table>
					</div>
				</div>
		</div> <!-- /container -->

		<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://code.jquery.com/jquery.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	</body>
</html>