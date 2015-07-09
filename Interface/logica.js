function verificarOpcion(x){
	switch (x) {
    	case 1:
	        return "opc1";
	        break;
	    case 2:
	        return "opc2";
	        break;
	    case 3:
	        return "opc3";
	        break;
	    case 4:
	        return "opc4";
	        break;
	    case 5:
	    	return "opc5";
	    	break;
	}
}

function cambiar(x){
	var c;
	c=verificarOpcion(x);
    document.getElementById(c).style.color = "white";
    document.getElementById(c).style.backgroundColor="red";
}

function normal(x){
	var c;
	c=verificarOpcion(x);
	document.getElementById(c).style.color = "#A60202";
	document.getElementById(c).style.backgroundColor="white";
}

function cambText(x){
	switch (x) {
    case 1:
        document.getElementById("Inicio").style.display = "block";
        document.getElementById("Matricula").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
    	break;
    case 2:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("Matricula").style.display = "block";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
        break;
    case 3:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("Matricula").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "block";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
        break;
    case 4:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("Matricula").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "block";
        document.getElementById("anonimo").style.display = "none";
        break;
    case 5:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("FormularioRegistro").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "block";
    	break;
	}
}

//BUSCA EL DIV A CAMBIAR
function verificarOpcionMatricula(x){
	switch(x){
		case 1:
			return "Registrar";
			break;
		case 2:
			return "Matricular";
			break;
	}
}

//FUNCION QUE SE ENCARGA DE CAMBIAR EL COLOR CUANDO EL PUNTERO ESTA ENCIMA DE ELLA
function cambiarOpcionMatricula(x){
	var c;
	c=verificarOpcionMatricula(x);
    document.getElementById(c).style.color = "black";
    document.getElementById(c).style.backgroundColor="green";
}

//FUNCION QUE SE ENCARGA DE CAMBIAR EL COLOR CUANDO EL PUNTERO YA NO ESTAENCIMA DE ELLA
function normalOpcionMatricula(x){
	var c;
	c=verificarOpcionMatricula(x);
    document.getElementById(c).style.color = "white";
    document.getElementById(c).style.backgroundColor="#18F000";
}


//SE ENCARGA DE INTERCAMBIAR LOS DIV
function cambiarTextMatricula(x){
	switch(x){
		case 1://MUESTRA EL DIV "FormuarioMatricula" Y OCULTA EL "FormularioRegistro"
			document.getElementById("FormuarioMatricula").style.display = "block";
			document.getElementById("FormularioRegistro").style.display = "none";
			break;
		case 2://MUESTRA EL DIV "FormularioRegistro" Y OCULTA EL "FormuarioMatricula"
			document.getElementById("FormuarioMatricula").style.display = "none";
	        document.getElementById("FormularioRegistro").style.display = "block";
			break;
	}
}	
//-----------------------------------------------------------------------------------------------------
//-----------------------------------------------------------------------------------------------------
//BUSCA EL DIV A CAMBIAR
function verificarOpcionBusqueda(x){
	switch(x){
		case 1:
			return "porCodigo";
			break;
		case 2:
			return "porNombre";
			break;
	}
}

//FUNCION QUE SE ENCARGA DE CAMBIAR EL COLOR CUANDO EL PUNTERO ESTA ENCIMA DE ELLA
function cambiarOpcionBusqueda(x){
	var c;
	c=verificarOpcionBusqueda(x);
    document.getElementById(c).style.color = "black";
    document.getElementById(c).style.backgroundColor="green";
}

//FUNCION QUE SE ENCARGA DE CAMBIAR EL COLOR CUANDO EL PUNTERO YA NO ESTAENCIMA DE ELLA
function normalOpcionBusqueda(x){
	var c;
	c=verificarOpcionBusqueda(x);
    document.getElementById(c).style.color = "white";
    document.getElementById(c).style.backgroundColor="#18F000";
}

//SE ENCARGA DE INTERCAMBIAR LOS DIV
function cambiarTextBusqueda(x){
	switch(x){
		case 1://MUESTRA EL DIV "FormuarioMatricula" Y OCULTA EL "FormularioRegistro"
			document.getElementById("FormularioCODIGO").style.display = "block";
			document.getElementById("FormularioNOMBRE").style.display = "none";
			break;
		case 2://MUESTRA EL DIV "FormularioRegistro" Y OCULTA EL "FormuarioMatricula"
			document.getElementById("FormularioCODIGO").style.display = "none";
	        document.getElementById("FormularioNOMBRE").style.display = "block";
			break;
	}
}

