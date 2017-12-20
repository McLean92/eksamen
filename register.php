<?php
require_once 'include/dbcon.php';
 if (isset($_POST['submit'])) {
	// Setting variables for username and password and validating with filter_input
	$name = filter_input(INPUT_POST, 'un', FILTER_SANITIZE_STRING)
		or die('Missing/illegal un parameter');

	$pw = filter_input(INPUT_POST, 'pw', FILTER_SANITIZE_STRING)
		or die('Missing/illegal pw parameter');
	// Hashing the password with a function --> making it to a unreadable string in the DB
	$pw = password_hash($pw, PASSWORD_DEFAULT);

	echo 'Creating ' .$name. 's <br> with password: '.$pw;
	// SQL statement - inserting the users values into the DB
	$sql = ("INSERT INTO users(un, pw) VALUES (?,?)");
	$stmt = $conn->prepare($sql);
 	$stmt->bind_param('ss', $name, $pw);
	$stmt->execute();
	// If the above is true then user is created
	if ($stmt->affected_rows > 1){
		$namesuccess = '.$name. created!';
		} 
	// If the above is false then user does not get created
	elseif ($stmt->affected_rows < 0){
		$namefail = 'Could not add the new user... <br> Please try with another username/password combination';
	}
}
?>

<!DOCTYPE html>

<html lang="en">

<head>
<!-- using php include to seperate/organize code -->
<?php include('include/resHead.php'); ?>
<title>Register user</title>

</head>
	<body>
	<!-- simplegrid - responsive design -->
	<div class="bknd-img">
		<div class="grid grid-pad">
			<div class="container col-6-12 push-3-12"><!-- container START -->
				<div class="form_head">
					<h1 class="headline">REGISTER NEW USER</h1>
				</div>

				<div class="img">
					<div class="form_body">
					<!-- creating a form so user can login  -->
						<form action="<?= $_SERVER["PHP_SELF"] ?>" method="POST">

							<!-- type = what datatype is required. Name = the connection between PHP and DB  -->
							<input class="col-6-12 push-3-12" type="text" name="un" placeholder="Username *"  data-validation="required">

							<!-- required is html validation. Makes sure user enter all fields -->
							<input class="col-6-12 push-3-12" type="password" name="pw" placeholder="Password *"  data-validation="required">

							<button class="submit col-6-12 push-3-12" type="submit" name="submit"> Create user </button>

							<div class="col-10-12 push-1-12 success">
								<?php echo $namesuccess; ?> <!-- If the user gets registred successfully -->
							</div>
							<div class="col-10-12 push-1-12 fail">
								<?php echo $namefail; ?> <!-- If the user registration fails -->
							</div>

						</form>

						<div class="signup col-6-12 push-3-12">
							<a href="login.php"> Log in now!<!-- Go to login page -->
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
