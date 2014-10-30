<?php 
//register.php

require_once 'includes/global.inc.php';
require_once 'includes/passwordHash.inc.php';

//boot them out if they're already logged in
if(isset($_SESSION['logged_in'])) {
	header("Location: index.php");
}

//initialize php variables used in the form
$username = "";
$password = "";
$password_confirm = "";
$email = "";
$fname = "";
$lname = "";
$description = "customer";
$error = "";

//check to see that the form has been submitted
if(isset($_POST['submit-form'])) { 

	//retrieve the $_POST variables
	$fname = $_POST['fname'];
	$lname = $_POST['lname'];
	$username = $_POST['username'];
	$password = $_POST['password'];
	$password_confirm = $_POST['password-confirm'];
	$email = $_POST['email'];

	//initialize variables for form validation
	$success = true;
	$userTools = new UserTools();
	
	//validate that the form was filled out correctly
	//check to see if user name already exists
	if($userTools->checkUsernameExists($username))
	{
		$error .= "That username is already taken.<br/> \n\r";
		$success = false;
	}

	//check to see if passwords match
	if($password != $password_confirm) {
		$error .= "Passwords do not match.<br/> \n\r";
		$success = false;
	}

	if($success)
	{
		//prep the data for saving in a new user object
		$data['username'] = $username;
		$data['password'] = create_hash($password); // salt and hash the password for storage
		$data['email'] = $email;
		$data['fname'] = $fname;
		$data['lname'] = $lname;
		$data['description'] = $description;

	
		//create the new user object
		$newUser = new User($data);
		//save the new user to the database
		$newUser->save(true);
		//log them in
		$userTools->login($username, $password);
		//redirect them to a welcome page
		header("Location: index.php");
		
	}

}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>


<html>
<head>
	<title>Registration</title>
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php
		// Show the navbar
		include 'navbar.php';
	?>

	<div class="container">
		<div class="panel panel-default">
			<div class="panel-heading">Register New User</div>
			
			<div class="panel-body">
				<?php
					// Show any Error Messages
					if($error !== "") {
						echo '<div class="alert alert-danger alert-dismissible" role="alert">
								<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span>
									<span class="sr-only">Close</span>
								</button>'.
								$error.
							'</div>';
					}
				?>
				<form id="viewUnsent" class="form-horizontal" role="form" action="register.php" method="post">
					<div class="form-group">
						<label for="fname" class="col-sm-2 control-label"><h4>First Name</h4></label>
						<div class="col-sm-10">
							<input id="fname" class="form-control" type="text" value="<?php echo $fname; ?>" name="fname">
						</div>
					</div>
					<div class="form-group">
						<label for="lname" class="col-sm-2 control-label"><h4>Last Name</h4></label>
						<div class="col-sm-10">
							<input id="lname" class="form-control" type="text" value="<?php echo $lname; ?>" name="lname">
						</div>
					</div>
					<div class="form-group">
						<label for="username" class="col-sm-2 control-label"><h4>Username</h4></label>
						<div class="col-sm-10">
							<input id="username" class="form-control" input type="text" value="<?php echo $username; ?>" name="username">
						</div>
					</div>
					<div class="form-group">
						<label for="pass" class="col-sm-2 control-label"><h4>Password</h4></label>
						<div class="col-sm-10">
							<input id="pass" class="form-control" type="password" value="<?php echo $password; ?>" name="password">
						</div>
					</div>
					<div class="form-group">
						<label for="passConf" class="col-sm-2 control-label"><h4>Confirm Password</h4></label>
						<div class="col-sm-10">
							<input id="passConf" class="form-control" type="password" value="<?php echo $password_confirm; ?>" name="password-confirm">
						</div>
					</div>
					<div class="form-group">
						<label for="email" class="col-sm-2 control-label"><h4>Email</h4></label>
						<div class="col-sm-10">
							<input id="email" class="form-control" type="text" value="<?php echo $email; ?>" name="email">
						</div>
					</div>
					<div class="form-group">
						<div class="col-sm-offset-2 col-sm-10">
							<input class="btn btn-default" type="submit" value="Register" name="submit-form">
						</div>
					</div>
				</form>
			</div>

		</div>
	</div>
<!--
	<form action="register.php" method="post">
		First Name: <input type="text" value="<?php echo $fname; ?>" name="fname" /><br/>
		Last Name: <input type="text" value="<?php echo $lname; ?>" name="lname" /><br/>
		Username: <input type="text" value="<?php echo $username; ?>" name="username" /><br/>
		Password: <input type="password" value="<?php echo $password; ?>" name="password" /><br/>
		Password (confirm): <input type="password" value="<?php echo $password_confirm; ?>" name="password-confirm" /><br/>
		E-Mail: <input type="text" value="<?php echo $email; ?>" name="email" /><br/>
	<input type="submit" value="Register" name="submit-form" />
	
	</form>
	-->

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>