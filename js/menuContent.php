<script language="javascript">
// Changing the cocktail menu content

// Displaying martinis
$(document).ready(function(){
$('.martini').click(function(){
  $('.content, .highballs, .rocks, .tikis, .beers, .wines').css('display', 'none');
  $('.martinis').css('display', 'inline-block');
  return false;
  });
});

// Displaying highballs
$(document).ready(function(){
$('.highball').click(function(){
  $('.content, .martinis, .rocks, .tikis, .wines, .beers').css('display', 'none');
  $('.highballs').css('display', 'inline-block');
  return false;
  });
});

// Displaying rocks
$(document).ready(function(){
$('.rock').click(function(){
  $('.content, .highballs, .martinis, .tikis, .beers, .wines').css('display', 'none');
  $('.rocks').css('display', 'inline-block');
  return false;
  });
});

// Displaying tikis
$(document).ready(function(){
$('.tiki').click(function(){
  $('.content, .rocks, .highballs, .martinis, .wines, .beers').css('display', 'none');
  $('.tikis').css('display', 'inline-block');
  return false;
  });
});

// Displaying wine
$(document).ready(function(){
$('.wine').click(function(){
  $('.content, .tikis, .rocks, .highballs, .martinis, .beers').css('display', 'none');
  $('.wines').css('display', 'inline-block');
  return false;
  });
});

// Displaying beer
$(document).ready(function(){
$('.beer').click(function(){
  $('.content, .wines, .tikis, .rocks, .highballs, .martinis').css('display', 'none');
  $('.beers').css('display', 'inline-block');
  return false;
  });
});

// Activating the icons, when clicked
  $(document).ready(function(){
    $('.icons').click(function(){
      $('.icons').removeClass("active");
      $(this).addClass("active");
  });
  });

</script>