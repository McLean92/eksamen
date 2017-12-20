<!-- contact page -->
<h1 class="col-1-1 h1">Contact</h1>
<div class="col-1-1 contactText">
	<h3 class="col-1-1 h3 ">Adress: Gentoftegade - - / 2820 Gentofte </h3>
	<h3 class="col-1-1 h3 ">cocktails@Joebynight.dk / +45 11 11 11 11</h3>
</div>

	<!-- php implementation to activate contact form START -->

    <?php
		  
		if(isset($_POST['sendmail'])){
			$firstname =filter_input(INPUT_POST, 'firstname', FILTER_SANITIZE_STRING) or die('missing firstname');
			$lastname =filter_input(INPUT_POST, 'lastname', FILTER_SANITIZE_STRING) or die('missing lastname');
			$Subject =filter_input(INPUT_POST, 'Subject', FILTER_SANITIZE_STRING) or die('missing subject');
			$email =filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL) or die('missing e-mail');
			$message =filter_input(INPUT_POST, 'message', FILTER_SANITIZE_STRING) or die('missing message');

			$to = 'charmainemc1@hotmail.com'; 
			$subject = 'Cocktailbar';
			$headers = "From: localhost <'".$email."'>\r\n"; 
			$headers .= "Reply-To: " .$email. "\r\n";
			$headers .= "X-Mailer: PHP's mail() Function\r\n";
			$headers .= "MIME-Version 1.0". "\r\n";
			$headers .= "Content-Type: text/html; charset=ut-8\r\n"; 

			$authenticate = null;

			$message= $name. ' has contacted you through the website with following message: ' ."\n\n". '  '.$message.' '."\n\n".' '.$name.'s known information is: ' ."\n". 'email: '.$email;
			$mailsent = mail($to, $subject, $message, $headers, $authenticate);
		}
	?>
         
<form method="post" action="<?=$_SERVER['PHP_SELF']?>"><!-- contact form with security added by using htmlspecialchars function. Avoiding the variable $_SERVER["PHP_SELF"] to be exploitet -->
                 
    <div class="col-1-1">
        <input class="cinput col-6-12" type="text" name="firstname" placeholder="Firstname *" data-validation="required" required autocomplete="on">

        <input class="cinput col-6-12" type="text" name="lastname" placeholder="Lastname *"  data-validation="required" required autocomplete="on">
    </div>    
       	<input class="cinput col-1-1" type="email" name="email" placeholder="Email *" data-validation="required" required autocomplete="on">

        <input class="cinput col-1-1" type="text" name="Subject" placeholder="Subject" data-validation="required">

        <textarea class="col-1-1 ctextbox" type="text" name="message" rows="6" cols="30" placeholder="Write a message" data-validation-help="Please give more information, thank you!"></textarea>
           
    <div class="col-1-1">
        <input class="col-6-12 submit" type="submit" name="sendmail" value="Send email">
    </div>    
</form>

<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2245.7064719275345!2d12.53845111604207!3d55.74622888055166!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x46524df6db39aaf9%3A0xcf79b7774e4e5d53!2sJOE+%26+THE+JUICE!5e0!3m2!1sen!2sdk!4v1512850612336" width="100%" height="200" frameborder="0" style="border:0" allowfullscreen></iframe><!-- Embedding Google Maps -->
