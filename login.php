<?php 
session_start();
require_once 'include/dbcon.php';

if (isset($_POST['submit'])){
		// Setting variables for password and username and validating with filter_input
		$un = filter_input(INPUT_POST, 'un', FILTER_SANITIZE_STRING)
			or die('Missing/illegal name parameter');
		$pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING)
			or die('Missing/illegal password parameter');
		
			// SELECTING data FROM table in DB using placeholders
			$sql = 'SELECT idusers, un, pw FROM users WHERE un=?';
			// Using prepared stmt in order to avoid SQL injections
			$stmt = $conn->prepare($sql);
			// binding placeholder in parameter
			$stmt->bind_param('s', $un);
			$stmt->execute();
			$result = $stmt->get_result();
			if($row = $result->fetch_assoc()) {
			// hash verifying password
			$hash = $row['pw'];
			if (password_verify($pw, $hash)){
				session_start();
				$_SESSION['id'] = $row['idusers']; // creating SESSIONS to be used on the admin page 
				$_SESSION['user'] = $row['un'];
				header("Location: admin.php");
				exit();
			} else {
				// Redirecting the user to login.php if the $un/$pw is wrong. 
				// A message is echoed on the login.php if the login fail - using the urldecode function which returns the url string
				header('Location: login.php?wrong=' . urldecode(base64_encode("Wrong Username or password")));
				exit();
			}
	}
} ?>

<!DOCTYPE html>
<html lang="en">
<head>
<!-- using php include to seperate/organize code -->
<?php include('include/resHead.php'); ?>
<title>Login superhero</title>

</head>
	<body>
	<!-- simplegrid - responsive design -->
	<div class="bknd-img2">
		<div class="grid grid-pad">
			<div class="container col-6-12 push-3-12"><!-- container START -->
				<div class="form_head">
					<h1 class="headline">USER LOGIN</h1>
				</div>

				<div class="img">
					<div class="form_body">
					<!-- creating a form so user can login. The script gets posted to the current page -->
						<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

							<!-- type = what datatype is required. Name = the connection between PHP and DB  -->
							<input class="col-6-12 push-3-12" type="text" name="un" placeholder="Username *"  data-validation="required">

							<!-- required is html validation. Makes sure user enter all fields -->
							<input class="col-6-12 push-3-12" type="password" name="pw" placeholder="Password *"  data-validation="required">

							<button class="submit col-6-12 push-3-12" type="submit" name="submit">Login user</button>

							<div class="col-10-12 push-1-12 fail">
								<?php if(isset($_GET['wrong'])) {
									echo base64_decode(urldecode($_GET['wrong'])); 
								}
								?>
								<?php if(isset($_GET['loggedout'])) {
										echo base64_decode(urldecode($_GET['loggedout']));
									} ?> 
								<?php if(isset($_GET['forcedlogout'])) {
										echo base64_decode(urldecode($_GET['forcedlogout']));
									} ?> <!-- Using the urldecode function to return the URL string (message echoed) -->
									</div>
						</form>

					<div class="signup col-6-12 push-3-12">Not registred yet? 
						<a href="register.php"> Do it here!<!-- The register page for regestring user -->
						</a>
					</div>

					</div><!-- form_body end -->
				</div><!-- img end -->


				<div class="form_footer">Copyright &#9400; <a href="www.portfolio.charmaine.dk" target="_blank">Charmaine McLean</a> 2017
				</div>

			</div><!-- container END -->
		</div><!-- grid grid-pad END -->
	</div><!-- bknd-img END -->
	</body>
</html>
