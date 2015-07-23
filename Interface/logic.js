$(document).ready(function(){
	$('.boton').mouseenter(function() {
	   $(this).css("background-color", "#757575");
	});
	$('.boton').mouseleave(function() {
		$(this).css("background-color", "#5D5D5D");
	});
	$('#Matricula').click(function(){
		window.location.href="matricula.html";
	});
	$('#Pagar').click(function(){
		$('#mostrador').hide();
		$('#Paga').fadeIn();
	});
});