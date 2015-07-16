function verificar(x){
	switch(x){
		case 1:
			return "inicio";
			break;
		case 2:
			return "pago";
			break;
		case 3:
			return "actualizar";
			break;
		case 4:
			return "constancias";
			break;
		case 5:
			return "logout";
			break;
	}
}
function cambiar(x){
	var c;
	c=verificar(x);
	document.getElementById(c).style.backgroundColor="#757575";
}
function normal(x){
	var c;
	c=verificar(x);
	document.getElementById(c).style.backgroundColor="#5D5D5D";
}