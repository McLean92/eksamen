<!-- The apply page -->
<h1 class="col-1-1 h1">Wanna be a part of the bartender team?</h1>

<div class="col-1-1 push-2-12" id="bartenderKit">
        <img src="icons/bartenderkit.svg" alt="bartenderKit image">
</div>

<h2 class="col-1-1 h2 ">Awesome! Go' for it!</h2>

<form class="col-1-1 applyForm" method="post" action="<?=$_SERVER['PHP_SELF']?>"><!-- contact form with security added by using htmlspecialchars function. Avoiding the variable $_SERVER["PHP_SELF"] to be exploitet -->
                 
    <div class="col-1-1">
         <input class="cinput col-6-12" type="text" name="firstname" placeholder="Firstname *" data-validation="required" required autocomplete="on">

         <input class="cinput col-6-12" type="text" name="lastname" placeholder="Lastname *"  data-validation="required" required autocomplete="on">
    </div>

    <input class="cinput col-1-1" type="email" name="email" placeholder="Email *" data-validation="required" required autocomplete="on">    

    <input class="cinput col-1-1" type="tel" name="phone" placeholder="Phone *" data-validation="required" required autocomplete="on">
                
    <div class="col-1-1">
        <input class="col-6-12 submit" type="submit" name="sendmail" value="Apply">
    </div>    
</form>