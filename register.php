<?php 
	include("includes/config.php");
	include("includes/classes/Account.php");
	include("includes/classes/Constants.php");
	// we are creating a new account for the registered user
	// that is an object. The rest of the clean up will take place inside //the class creating an account
	$account=new Account($con);


	include("includes/handlers/register-handler.php");
	include("includes/handlers/login-handler.php");

	function getInputValue($name){
		if(isset($_POST[$name])){
			echo $_POST[$name];
		}
	}
?>



<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Slotify</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register.css">

	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>
	<script src="assets/js/register.js"></script>
</head>
<body>

	<?php
		if(isset($_POST['registerButton'])){
			echo '<script>
					  $(document).ready(function(){
							$("#loginForm").hide();
							$("#registerForm").show();
					  });
				  </script>';
		}else{
			echo '<script>
					  $(document).ready(function(){
							$("#loginForm").show();
							$("#registerForm").hide();
					  });
			      </script>';
		}
	 ?>
	<script>
		// js cannot read when a php button is pressed
		$(document).ready(function(){
				$("#loginForm").show();
				$("#registerForm").hide();
		});
	</script>

	<div id="background">

		<div id="loginContainer">

			<div id="inputContainer">
				<form id="loginForm" action="register.php" method="POST">
					<h2>Login to your account</h2>
					<p>
						<!-- database problem rework db at the end of project -->
						<?php echo $account->getError(Constants::$loginFailed) ?>
						<label for="loginUsername">Username</label>
						<input id="loginUsername" type="text" name="loginUsername" placeholder="e.g. John Doe" value="<?php getInputValue('loginUsername'); ?>" required>
					</p>
					<p>
						<label for="loginPassword">Password</label>
						<input id="loginPassword" type="password" name="loginPassword" placeholder="Your password" required>
					</p>

					<button type="submit" name="loginButton">LOG IN</button>
					<div class="hasAccountText">
						<span id="hideLogin">Don't have an account yet? Signup here</span>
					</div>
				</form>


									<!-- Register -->
				<form id="registerForm" action="register.php" method="POST">
					<h2>Create your FREE account</h2>
					<!-- name -->
					<p>
						<?php echo $account->getError(Constants::$firstNameCharacters) ?>
						<label for="firstName">first name</label>
						<input id="firstName" type="text" name="firstName" placeholder="e.g. John" value="<?php getInputValue('firstName'); ?>" required>
					</p>

					<p>
						<?php echo $account->getError(Constants::$lastNameCharacters) ?>
						<label for="lastName">last name</label>
						<input id="lastName" type="text" name="lastName" placeholder="e.g. Doe" value="<?php getInputValue('lastName'); ?>" required>
					</p>

					<!-- email -->
					<p>
						<?php echo $account->getError(Constants::$emailInvalid) ?>
						<?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
						<?php 
							echo $account->getError(Constants::$emailTaken)
						 ?>
						<label for="email">Email</label>
						<input id="email" type="email" name="email" placeholder="e.g. test@example.com" value="<?php getInputValue('email'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$emailInvalid) ?>
						<?php echo $account->getError(Constants::$emailsDoNotMatch) ?>
						<?php 
							echo $account->getError(Constants::$emailTaken)
						 ?>
						<label for="confirmEmail">Confirm Email</label>
						<input id="confirmEmail" type="email" name="confirmEmail" placeholder="e.g. test@example.com" value="<?php getInputValue('confirmEmail'); ?>" required>
					</p>

					<!-- username -->
					<p>
						<?php echo $account->getError(Constants::$usernameCharacters) ?>
						<?php 
							echo $account->getError(Constants::$usernameTaken)
						 ?>
						<label for="registerUsername">Username</label>
						<input id="registerUsername" type="text" name="registerUsername" placeholder="e.g. John Doe" value="<?php getInputValue('registerUsername'); ?>" required>
					</p>

					<!-- password -->
					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
						<?php echo $account->getError( Constants::$passwordsNotAlphanumeric) ?>
						<?php echo $account->getError(Constants::$passwordCharacters) ?>

						<label for="password">Password</label>
						<input id="password" type="password" name="password"  placeholder="Your password" value="<?php getInputValue('password'); ?>" required>
					</p>
					<p>
						<?php echo $account->getError(Constants::$passwordsDoNotMatch) ?>
						<?php echo $account->getError( Constants::$passwordsNotAlphanumeric) ?>
						<?php echo $account->getError(Constants::$passwordCharacters) ?>
						<label for="password2">Confirm Password</label>
						<input id="password2" type="password" name="password2" placeholder="Your password" value="<?php getInputValue('password2'); ?>" required>
					</p>

					<button type="submit" name="registerButton">SIGN UP</button>
					<div class="hasAccountText">
						<span id="hideRegister">Already have an account? log in here.</span>
					</div>
				</form>
			</div>
			<div id="loginText">
				<h1>Get great music, right now</h1>
				<h2>Listen to loads of songs for free</h2>
				<ul>
					<li>Discover music you'll fall in love with</li>
					<li>Create your own playlists</li>
					<li>Follow artists to stay up to date</li>
				</ul>
			</div>
		</div>
	</div>
</body>
</html>