
document.getElementById("italica").onmouseover= italicas;
document.getElementById("negrita").onmouseover = negritas;
document.getElementById("mayus").onmouseover = smallmayus;
document.getElementById("normal").onmouseover = normal;
window.setTimeout(tiempo, milliseconds);


function italicas(){

	var x=document.getElementsByClassName("cuestionario");
	for(var i=0;i<x.length;i++){
		x[i].style.fontStyle = "italic";
	}

}

function negritas(){
	var x=document.getElementsByClassName("cuestionario");
	for(var i=0;i<x.length;i++){
		x[i].style.fontWeight = "bold";
	}
}

function smallmayus(){
	var x=document.getElementsByClassName("cuestionario");
	for(var i=0;i<x.length;i++){
		x[i].style.fontVariant = "small-caps";
	}
}

function normal(){
	var x=document.getElementsByClassName("cuestionario");
	for(var i=0;i<x.length;i++){
		x[i].style.fontVariant = "normal";
		x[i].style.fontWeight = "normal";
		x[i].style.fontStyle = "normal";

	}
}

function tiempo(){
	alert("Lab 6");
}


