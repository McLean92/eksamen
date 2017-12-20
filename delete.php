<?php
if(isset($_POST["delete-booking"])){
  // If button is clicked all info selected from DB is deleted
  $bookingId = filter_input(INPUT_GET, 'bid', FILTER_VALIDATE_INT) or die('Error: missing bookingId');
  
  $sql="DELETE FROM `booking` WHERE idRes=?"; 
  $stmt = $conn->prepare($sql);
  $stmt ->bind_param('i', $bookingId); 
  $stmt->execute(); 

  header("location:admin.php");// User gets relocated to admin page, when deleting info
}
?>