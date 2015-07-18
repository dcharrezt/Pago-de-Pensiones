$(document).ready(function() {
	$('.Botones').mouseenter(function() {
	   $(this).css("background-color", "#757575");
	});
	$('.Botones').mouseleave(function() {
	   $(this).css("background-color", "#5D5D5D");
	});
	$('#inicio').click(function(){
		$('#PaginaInicio').slideDown(5000);
	});
});