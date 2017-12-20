<?php if(isset($_POST['upload'])) {

// creating SESSION variables 
$user = $_SESSION['user'];
$target = "images/".basename($_FILES['image']['name']);
$image = basename($_FILES['image']['name']);

// Using superglobal $_FILES to define image type and size
$fileSize = $_FILES['image']['size'];
$fileType = $_FILES['image']['type'];

// Using SQL UPDATE to upload a new image 
$sql = ("UPDATE users SET image=? WHERE un='$user'");
$stmt = $con->prepare($sql);
$stmt->bind_param('s', $image);
$stmt->execute();
// Using an IF statement and function to relocate the destination of the image
// The image is relocated to the file 'Images' on the server
// But the name of the image 'something.jpg' is stored in the DB
if (move_uploaded_file($_FILES['image']['tmp_name'], $target)){
	echo $user;
} else {
	echo 'something went wrong';
}

}

 ?>