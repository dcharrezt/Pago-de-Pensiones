$(document).ready(function() {
	$('.Botones').mouseenter(function() {
	   $(this).css("background-color", "#757575");
	});
	$('.Botones').mouseleave(function() {
	   $(this).css("background-color", "#5D5D5D");
	});
	$('#inicio').click(function(){
		$('#PaginaInicio').slideDown(4000);
		$('#PaginaPago').hide();
		$('#PaginaActualizar').hide();
		$('#PaginaConstancias').hide();
	});
	$('#pago').click(function(){
		$('#PaginaPago').fadeIn();
		$('#PaginaInicio').hide();
		$('#PaginaActualizar').hide();
		$('#PaginaConstancias').hide();
	});
	$('#actualizar').click(function(){
		$('#PaginaActualizar').fadeIn();
		$('#PaginaInicio').hide();
		$('#PaginaPago').hide();
		$('#PaginaConstancias').hide();
	});
	$('#constancias').click(function(){	
		$('#PaginaConstancias').fadeIn();
		$('#PaginaActualizar').hide();
		$('#PaginaInicio').hide();
		$('#PaginaPago').hide();
	});
});