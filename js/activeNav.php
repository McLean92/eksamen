<script>
// JS for active links
	$(document).ready(function(){
	  $('.act, ul li a').click(function(){
	    $('.act, ul li a').removeClass("active");
	    $(this).addClass("active");
	});
	});

</script>