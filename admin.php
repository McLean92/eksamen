<?php 
session_start(); 
require_once('include/dbcon.php');

if(!isset($_SESSION['user'])){
    header('Location: login.php'); // User can not see content without being logged in first
}
include ('include/upload.php');
?>
<!doctype html>
<html>
<head>
<title>Admin - Cate & the cocktail</title>
<?php include 'include/adminHead.php'; ?>
</head>

<body>
   
    <div class="grid grid-pad"><!-- responsive grid -->
        <div class="container col-1-1">
            <div class="col-1-1 header">
                <div class="push-6-12 col-4-12 nav"><!-- Nav start -->
                    <form class="col-1-2" action="logout.php" method="POST">
                        <button class="upload" type="submit" name="submitlogout">Logout</button><!-- btn log out -->
                    </form>    
                    <form class="col-1-2" action="<?php $_SERVER['PHP_SELF']?>" method="POST" enctype="multipart/form-data">
                        <input class="col-1-2 upload" type="file" name="image">
                        <button class="col-1-2 upload" type="submit" name="upload">Upload picture</button><!-- btn upload user img -->
                    </form>
                </div><!-- Nav end-->
            </div>

                <div class="col-2-12 admin-photo">
                    <img src="images/<?= $imgData ?>" alt="User image"><!-- The user image displayed -->
                </div>
               
            <div class="push-2-12 col-8-12 content"><!-- content start -->
                <div class="push-3-12 col-9-12">
                    <h1 class="col-1-1 h1">Welcome <?= $_SESSION['user'] ?></h1><!-- Using SESSION to post the logged in users name -->
                </div>
                <div class="col-1-1 section">
                    <div class="push-6-12 col-6-12" >
                        <form method="post" action="<?php $_SERVER['PHP_SELF']?>"> 
                             <select class="push-1-12 col-4-12 select" name="location" type="text" id="resPeople"  required>
                                <option selected disabled>Choose store:</option>
                                <!-- Making a SELECT of storeid from DB in order to find the bookings of each store -->
                                  <?php 
                                  $sql="SELECT idStore, storeName FROM `location`";
                                  $stmt = $conn->prepare($sql); //link to DB
                                  $stmt ->bind_result($idStore, $storeName); //binding results to variables
                                  $stmt->execute(); //executing code 
                                  
                                  while($stmt->fetch()){ //while executing: store id and name fetched in loop
                                    echo '
                                    <option value="'.$idStore.'">'.$storeName.'</option>'; 
                                  }
                                  ?>
                              </select>
                            <input class="col-3-12 submit" type="submit" name="submit" value="Select store">
                        </form>
                    
                        <button class="col-3-12" id="btn">New booking</button>
                        <?php include 'include/modalbox.php'; ?><!-- The modalbox for CREATE NEW booking -->
                    </div>
                </div>
                <div class="col-1-1 section2">
                <!-- Following code fetches all the booking information from the store selected above and displays it in a table below -->
                <?php 
                if (isset($_POST['submit'])) {

                    $location = filter_input(INPUT_POST, 'location', FILTER_SANITIZE_STRING)
                        or die('Missing/illegal location parameter');

                    $sql = "SELECT t1.firstname, t1.lastname, t1.email, t1.phone, t2.idRes, t2.people, t2.day, t2.hour, t2.comment, t3.storeName 
                            FROM `customer` t1, `booking` t2, `location` t3
                            WHERE t2.idCustomer = t1.idCustomer and t2.idStore=t3.idStore and t3.idStore=?";
                    $stmt = $conn->prepare($sql);
                    $stmt->bind_param('i', $location);
                    $stmt->execute();
                    $stmt->bind_result($firstname, $lastname, $email, $phone, $bookingId, $people, $day, $hour, $comment, $storeName);
                    while($stmt->fetch()) { ?>

                    <h1 class="section2h">Booking datails of <?=$storeName?>:</h1>
                    <table class="col-1-1">
                        <tr>
                            <th>Firstname:</th>
                            <th>Lastname:</th>
                            <th>Email:</th>
                            <th>Phone:</th>
                            <th>Number of people:</th>
                            <th>Date:</th>
                            <th>Time of day:</th>
                            <th>Comment:</th>

                        </tr>
                        <tr>
                            <td><?=$firstname?></td>
                            <td><?=$lastname?></td>
                            <td><?=$email?></td>
                            <td><?=$phone?></td>
                            <td><?=$people?></td>
                            <td><?=$day?></td>
                            <td><?=$hour?></td>
                            <td><?=$comment?></td>
                            <td><a href="update.php?bid=<?php echo $bookingId;?>" target="_blank">Update</a></td>
                        </tr>
                    </table>
                   
                    <?php };
                }
                ?>
                </div>
            </div><!-- content end -->
            <div class="col-2-12">
            </div>

        <div class="col-1-1 footer">
            <p> Copyright © 2017 </p> 
            <p> Cphbusiness school project </p>
        </div>
    </div>
    </div>
</body>
</html>