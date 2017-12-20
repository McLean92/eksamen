<?php
    require_once('include/dbcon.php');
    if (isset($_POST['bookTable'])) {

        $firstname = filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING)
          or die('Error: missing firstname parameter'); 

        $lastname = filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING)
          or die('Error: missing lastname parameter'); 
        
        $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL)
          or die('Error: missing email parameter'); 

        $phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING)
          or die('Error: missing phone parameter'); 

        $comment = filter_input(INPUT_POST, 'comment', FILTER_SANITIZE_STRING); 

        $people = filter_input(INPUT_POST, 'people', FILTER_SANITIZE_NUMBER_INT)
           or die('Error: missing people parameter'); 

        $day = filter_input(INPUT_POST, 'day', FILTER_SANITIZE_STRING)
           or die('Error: missing day parameter');

        $hour = filter_input(INPUT_POST, 'hour', FILTER_SANITIZE_STRING)
           or die('Error: missing hour parameter'); 

        $idStore = filter_input(INPUT_POST, 'store', FILTER_VALIDATE_INT)
            or die('Error: missing store parameter');

        $sql = 'INSERT INTO `customer` (firstname, lastname, email, phone) VALUES (?,?,?,?)';
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ssss', $firstname, $lastname, $email, $phone);
        $stmt->execute();
        $idCustomer = $conn->insert_id;

        $sql = 'INSERT INTO `booking` (people, day, hour, comment, idCustomer, idStore) VALUES (?,?,?,?,?,?)';       
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('isssss', $people, $day, $hour, $comment, $idCustomer, $idStore);
        $stmt->execute();  
        
      header('Location: index.php');
    }
?>

  <div class="col-1-1 push-2-12" id="chairNtable">
        <img src="icons/chairNtable.svg" alt="table and chair image">
    </div>

   <form method="post" action="<?php $_SERVER['PHP_SELF']?>"><!-- contact form with security added by using htmlspecialchars function. Avoiding the variable $_SERVER["PHP_SELF"] to be exploitet -->
                <div class="col-1-1">
                    <input class="cinput col-6-12" type="text" name="firstname" placeholder="Firstname *" required autocomplete="on">

                    <input class="cinput col-6-12" type="text" name="lastname" placeholder="Lastname *" required autocomplete="on">
                </div> 
                <div class="col-1-1">  
                  <input class="cinput col-6-12" type="email" name="email" placeholder="Email *" data-validation="required" required autocomplete="on">
                  <input class="cinput col-6-12" type="tel" name="phone" placeholder="Phone *" required autocomplete="on">
                </div>
                <div class="col-1-1">  
                  <select class="cinput col-6-12" name="people" type="number" id="resPeople"  required>
                    <option selected disabled>Number of people *</option>
                    <?php 
                    for ($i = 1; $i <= 20; $i++) {
                      echo'
                      <option value="'.$i.'" >'.$i.'</option>';
                      } 
                    ?>            
                  </select>

                  <select class="cinput col-6-12" name="store" type="text" id="resPeople"  required>
                    <option selected disabled>Choose store *</option>
                  <?php 
                  $sql="SELECT idStore, storeName FROM `location`";
                  $stmt = $conn->prepare($sql); //fat i vores database
                  $stmt ->bind_result($idStore, $storeName); //binde vores resultater med to variabler
                  $stmt->execute(); //så bliver det exekveret 
                  
                  while($stmt->fetch()){ //mens det bliver kørt i gennem skal vi exekvere noget
                    echo '
                    <option value="'.$idStore.'">'.$storeName.'</option>'; 
                  }
                  ?>
                  </select>
                
             
                </div>
                <div class="col-1-1">    
                	<input class="cinput col-6-12" type="time" name="hour" data-validation="required">
                	<input class="cinput col-6-12" id="reservation" type="date" name="day" data-validation="required">
                </div>
                <textarea class="col-1-1 ctextbox" type="text" name="comment" rows="6" cols="30" placeholder="Leave a message" data-validation-help="Please give more information, thank you!"></textarea>
                <div class="col-1-1">
                  <input class="col-6-12 submit" type="submit" name="bookTable" value="Book table">
                </div>    
    </form>
