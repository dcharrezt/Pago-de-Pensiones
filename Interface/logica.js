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
	document.getElementById(c).style.color = "black";
	document.getElementById(c).style.backgroundColor="white";
}

function cambText(x){
	switch (x) {
    case 1:
        document.getElementById("Inicio").style.display = "block";
        document.getElementById("FormularioRegistro").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
    	break;
    case 2:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("FormularioRegistro").style.display = "block";
        document.getElementById("BuscarAlumno").style.display = "none";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
        break;
    case 3:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("FormularioRegistro").style.display = "none";
        document.getElementById("BuscarAlumno").style.display = "block";
        document.getElementById("RetirarAlumno").style.display = "none";
        document.getElementById("anonimo").style.display = "none";
        break;
    case 4:
    	document.getElementById("Inicio").style.display = "none";
        document.getElementById("FormularioRegistro").style.display = "none";
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