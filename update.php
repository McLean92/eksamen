<?php 
session_start();
require_once 'include/dbcon.php';
/*  Update booking information + delete */
if(isset($_POST["update-booking"])){
  
    $bookingId = filter_input(INPUT_GET, 'bid', FILTER_VALIDATE_INT) or die('Error: missing bookingId');
    $firstname = filter_input(INPUT_POST, 'fn', FILTER_SANITIZE_STRING) or die('Error: missing booking firstname');
    $lastname = filter_input(INPUT_POST, 'ln', FILTER_SANITIZE_STRING) or die('Error: missing booking lastname');
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) or die('Error: missing booking email');
    $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) or die('Error: missing booking phone');
    $people = filter_input(INPUT_POST, 'people', FILTER_VALIDATE_INT) or die('Error: missing booking people');
    $day = filter_input(INPUT_POST, 'date', FILTER_SANITIZE_STRING) or die('Error: missing booking date');
    $hour = filter_input(INPUT_POST, 'time', FILTER_SANITIZE_STRING) or die('Error: missing booking time');
    $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING);
    //$storeName = filter_input(INPUT_POST, 'store', FILTER_SANITIZE_STRING) or die('Error: missing booking store');

    // Updating CUSTOMER table in DB
  $sql="UPDATE `customer` t1, `booking` t2 SET t1.firstname=?, t1.lastname=?, t1.email=?, t1.phone=?  WHERE t1.idCustomer = t2.idCustomer and t2.idRes=?";

  $stmt = $conn->prepare($sql);
  $stmt ->bind_param('ssssi', $firstname, $lastname, $email, $phone, $bookingId);

  $stmt->execute();
  if($stmt->errno){
    echo 'FAILURE!! ' .$stmt->error();
    }
  else{
    if($stmt->affected_rows >= 1){
      $updated = 'Booking id' .$bookingId.' has been changed!';
    }
    else{
      $updated = '';
    }
  }

  // Updating BOOKING table in DB
  $sql2="UPDATE `booking` SET people=?, day=?, hour=?, comment=?  WHERE idRes=?";

  $stmt2 = $conn->prepare($sql2); //fat i vores database
  $stmt2 ->bind_param('isssi', $people, $day, $hour, $comment, $bookingId); //binde vores resultater med to variabler

   $stmt2->execute();//så bliver det eksekveret 
  if($stmt2->errno){
    echo 'FAILURE!! ' .$stmt2->error();

    }
  else{
    if($stmt2->affected_rows >= 1){
      $updated2 = 'Booking id' .$bookingId.' has been changed!';
      
    }
    else{
      $updated2 = '';
    }
  }
}
  // Deleting booking
require_once 'delete.php';

  $bookingId = filter_input(INPUT_GET, 'bid', FILTER_VALIDATE_INT) or die('Error: missing type bookingid');
?>

<!doctype html>
<html>
<head>
  <title>Update page - Cate & the cocktail</title>
  <?php include 'include/adminHead.php'; ?>
</head>

<body>
  <div class="grid grid-pad"><!-- responsive grid -->
    <div class="container col-1-1">
        <div class="col-1-1 header">
            <div class="push-6-12 col-4-12 nav"><!-- Nav start -->    
            </div><!-- Nav end-->
        </div>
        <div class="push-2-12 col-8-12 content"><!-- content start -->
          <div class="col-1-1 box">
            <form class="col-1-1 updateform section section2" method="post" action="<? $_SERVER['PHP_SELF']?>">
              <!-- Fetching booking data from DB and displaying through WHILE LOOP in INPUT fields for update -->
              <?php 

                $sql = "SELECT t1.firstname, t1.lastname, t1.email, t1.phone, t2.people, t2.day, t2.hour, t2.comment, t3.storeName 
                        FROM `customer` t1, `booking` t2, `location` t3
                        WHERE t2.idCustomer = t1.idCustomer and t2.idStore=t3.idStore and t2.idRes=?";
                        $stmt = $conn->prepare($sql);
                        $stmt->bind_param('i', $bookingId);
                        $stmt->execute();
                        $stmt->bind_result($firstname, $lastname, $email, $phone, $people, $day, $hour, $comment, $storeName);
                        while($stmt->fetch()) { 
                        echo '<h1 class="section2h col-1-1">Changing bookingId' .$bookingId.'</h1>';
                        echo '<p>Firstname:</p><input value="'.$firstname.'" name="fn" type="text"/>';
                        echo '<p>Lastname:</p><input value="'.$lastname.'" name="ln" type="text"/>';
                        echo '<p>Email:</p><input value="'.$email.'" name="email" type="email"/>';
                        echo '<p>Phone:</p><input value="'.$phone.'" name="phone" type="tel"/>';
                        echo '<p>Number of people:</p><input value="'.$people.'" name="people" type="number"/>';
                        echo '<p>Date:</p><input value="'.$day.'" name="date" type="date"/>';
                        echo '<p>Time of day:</p><input value="'.$hour.'" name="time" type="time"/>';
                        echo '<p>Comment:</p><input value="'.$comment.'" name="comment" type="text"/>'; 
                        echo '<br><br><button class="submit" type="submit" name="update-booking" value="update">Update booking</button>';
                        echo '<button class="submit" type="submit" name="delete-booking" value="delete">Delete booking</button>';  
                }
              ?>
          </form>
        </div>
          <div class="section2 col-1-1 message">
            <?php 
            // Displaying message if updating data 
              echo $updated;
              echo $updated2;
            ?> 
          </div>
        </div>

    </div>
  </div>  
  
  
</body>
</html>