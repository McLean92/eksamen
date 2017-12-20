<script language="javascript">
 

// Diplsaying video on the home page
$(document).ready(function(){
$('.homeChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'none');
  $('.video-container').css('display', 'block');
  $('.sidebar_bar, .martinis, .highballs, .tikis, .rocks, .beers, .wines').css('display', 'none');
  
  var video = document.getElementById('video');
  video.currentTime = 0;
  return false;
  });
});

// Making sure the video is hidden, when the other "pages" are clicked
$(document).ready(function(){
$('.resChange, .menuChange, .aboChange, .appChange, .eveChange, .conChange').click(function(){
  $('.content').css('background-image', 'block');
  $('.sidebar_bar').css('display', 'block');
  $('.video-container').css('display', 'none');

});
});

// Changing the bknd - for the reservation pages
$(document).ready(function(){
$('.resChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/chair.jpg'); 
  return false;
	});
});

// Changing the bknd - for the home page
$(document).ready(function(){
$('.menuChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/drink.jpg');
  return false;
	});
});

// Changing the bknd - for the about page
$(document).ready(function(){
$('.aboChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/room.jpg');
  return false;
	});
});

// Changing the bknd - for the apply page
$(document).ready(function(){
$('.appChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/barkit.jpg');
  return false;
	});
});

// Changing the bknd - for the events page
$(document).ready(function(){
$('.eveChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/mirror.jpg');
  return false;
	});
});

// Changing the bknd - for the contact page
$(document).ready(function(){
$('.conChange').click(function(){
  $('.content').css('display', 'block');
  $('.content').css('background-image', 'url(images/bottles.jpg');
  return false;
	});
});

</script>