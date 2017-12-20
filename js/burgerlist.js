// JavaScript Document
// The JS code toggling the burger menu

$('button').click(function(){
	$(this).toggleClass('expanded').siblings('div').slideToggle(400);
}
);

