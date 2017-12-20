
<script>
// JS for displaying the sidebars in and out

// The reservation sidebar
$(document).ready(function(){
  $('#menu_reservation').click(function(){
    $('#reservation_menu').css({"transform":"translateX(0vw)"});

    $("#contact_menu, #apply_menu, #events_menu, #about_menu, #cmenu_menu").css({"transform":"translateX(-40vw)"});

    $("#calendar").css({"transform":"translateX(-80vw)"});

  });

// The menu sidebar
  $('#menu_menu').click(function(){
    $('#cmenu_menu').css({"transform":"translateX(0vw)"});

    $("#contact_menu, #apply_menu, #events_menu, #about_menu, #reservation_menu").css({"transform":"translateX(-40vw)"});
  });

// The about sidebar
  $('#menu_about').click(function(){
    $('#about_menu').css({"transform":"translateX(0vw)"});

    $("#contact_menu, #apply_menu, #events_menu, #cmenu_menu, #reservation_menu").css({"transform":"translateX(-40vw)"});
  });

// The apply sidebar
  $('#menu_apply').click(function(){
    $('#apply_menu').css({"transform":"translateX(0vw)"});

    $("#contact_menu, #events_menu, #about_menu, #cmenu_menu, #reservation_menu").css({"transform":"translateX(-40vw)"});
  });

// The events sidebar
  $('#menu_events').click(function(){
    $('#events_menu').css({"transform":"translateX(0vw)"});

    $("#contact_menu, #apply_menu, #about_menu, #cmenu_menu, #reservation_menu").css({"transform":"translateX(-40vw)"});
  });

// The contact sidebar
  $('#menu_contact').click(function(){
    $('#contact_menu').css({"transform":"translateX(0vw)"});

    $("#events_menu, #apply_menu, #about_menu, #cmenu_menu, #reservation_menu").css({"transform":"translateX(-40vw)"});
  });

//sidebar-bar-bar: The 3 side bar on the page - located at reservation-page
   $('#reservation').click(function(){
    $('#calendar').css({"transform":"translateX(0vw)"});
  });

   $('#events').click(function(){
    $('#suggestions').css({"transform":"translateX(0vw)"});
  });

// Closing the sidebars
 $('.closebar').click(function(){
  	$(".sidebar_bar").css({"transform":"translateX(-40vw)"});

  	$("#calendar, #suggestions").css({"transform":"translateX(-80vw)"});

  });

  $('.closebar_bar').click(function(){
  	$("#calendar, #suggestions").css({"transform":"translateX(-80vw)"});
  });
});
</script>