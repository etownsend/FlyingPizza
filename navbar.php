<?php
//index.php 
require_once 'includes/global.inc.php';
?>

<div class="navbar navbar-default navbar-static-top" role="navigation">
	  <div class="container">
			<div class="navbar-header">
				<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				</button>
					<a class="navbar-brand" href="#">The Flying Pizza Company</a>
				</div>
				<div class="navbar-collapse collapse">
					<ul class="nav navbar-nav">
						<li><a href="index.php">Home</a></li>

						<?php if(isset($_SESSION['logged_in'])) : ?>
							<?php $user = unserialize($_SESSION['user']); ?>
							<li><a href="settings.php"><?php echo $user->username."'s Settings"; ?></a></li>
							<li><a href="logout.php">Logout</a></li>
						<?php else : ?>
							<li><a href="register.php">Register</a></li>
							<li><a href="login.php">Log In</a></li>
						<?php endif; ?>
				  </ul>
			</div><!--/.nav-collapse -->
	  </div>
</div>