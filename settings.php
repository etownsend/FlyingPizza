<?php 

require_once 'includes/global.inc.php';

//check to see if they're logged in
if(!isset($_SESSION['logged_in'])) {
	header("Location: login.php");
}

//get the user object from the session
$user = unserialize($_SESSION['user']);

//initialize php variables used in the form
$email = $user->email;
$message = "";

//check to see that the form has been submitted
if(isset($_POST['submit-settings'])) { 

	//retrieve the $_POST variables
	$email = $_POST['email'];

	$user->email = $email;
	$user->save();

	$message = "Settings Saved<br/>";
}

//If the form wasn't submitted, or didn't validate
//then we show the registration form again
?>


<html>
<head>
	<title>Change Settings</title>

	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<!-- Bootstrap -->
	<link href="css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
	<?php 
		include 'navbar.php';
	?>

	<div class="container">
		<div class="jumbotron">

			<?php 
				if($message !== "") {
					echo 
						'<div class="alert alert-success alert-dismissible" role="alert">
  							<button type="button" class="close" data-dismiss="alert">
  								<span aria-hidden="true">&times;</span>
  								<span class="sr-only">Close</span>
  							</button>
  							Changes Saved
						</div>';
				}
			?>

			<div class="col-md-1">Email</div>
			<div class="col-xs-6">
				<form action="settings.php" method="post">
					<div class="input-group">
						<input type="text" value="<?php echo $email; ?>" name="email" class="form-control">
						<span class="input-group-btn">
							<button class="btn btn-default" type="submit" value="Update" name="submit-settings">Go!</button>
						</span>
					</div><!-- /input-group -->
				</form>
			</div><!-- /.col-lg-6 -->

		</div>
	</div>

	<!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
	<script src="https://code.jquery.com/jquery.js"></script>
	<!-- Include all compiled plugins (below), or include individual files as needed -->
	<script src="js/bootstrap.min.js"></script>
</body>
</html>