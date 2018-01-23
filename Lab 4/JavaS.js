
function javas(problema){
	if(problema == 1){
		var num = prompt ("Dame un número: ");
		tablaCuadraCubo(num);
	}else if(problema == 2){
		sumaAleatoria();
	}else if(problema ==3){
		var elementos = parseInt(prompt("¿Qué número de arreglos quieres? "));
		var array = new Array;
		for(var j=0; j<elementos; j++){
			array[j]=parseInt(prompt("Dame los números que desees en el arreglo"));
		}
		contador(array);
	}else if(problema == 4){
		promedio();
	}else if(problema == 5){
		 inverso();
	}else if(problema == 6){
        solucion();
    }
}

function tablaCuadraCubo(num){
	var table = "<table><thead><th>Numero</th><th>Cuadrado</th><th>Cubo</th></thead>";
    table += "<tr><td>---------</td><td>---------</td><td>---------</td></tr>";
    for(var i = 1;i<=num;i++){
       table+="<tr><td>" + i + "</td>";
       table+="<td>" + Math.pow(i,2) + "</td>";
       table+="<td>" + Math.pow(i,3) + "</td>";
       table+="</tr>";
    }
    document.write(table);
}

function sumaAleatoria(){
	n1 = Math.floor((Math.random() * 10000) + 1);
	n2 = Math.floor((Math.random() * 10000) + 1);
	var tinicio = new Date();
	var r = prompt("¿Cual es el resultado de: \n" + n1 + " + " + n2 +"?");
	var tfin = new Date();
	var ttotal = Math.round(((tfin - tinicio)/1000));
	if(r == (n2+n1)){
       alert("¡Bien! " + r +"\nTe tardaste: " + ttotal + " segundos");
    }else{
        alert("El resultado era: " + (n2+n1) + "\nTe tardaste: " + ttotal + " segundos");
    }

}

function contador(array){
    var cero = 0;
    var macero = 0;
    var neg = 0;
    for(var i = 0; i <array.length;i++){
        if(array[i] > 0){
            macero++;
        }else if(array[i] < 0){
            neg++;
        }else{
            cero++;
        }
    }
    alert("Numeros en el arreglo\nMayores a cero: "+ macero + "\nCeros: " + cero + "\nNegativos: " + neg);
}

function promedio(){
	var column = parseInt(prompt("Dame el número de columnas para tu matriz: ")); 
		var fila = parseInt(prompt("Dame el número de filas para tu matriz: "));
		var matriz= new Array();
		for (var j=0; j<fila; j++){
			matriz[j] = new Array();
			for(var i=0; i<column; i++){
				matriz[i][j] = parseInt(prompt("Dame el número que deseas meter en la fila " + j +":"));
			}
		}
    var arreglo = new Array();
    for(var x = 0; x < matriz.length;x++){
        arreglo[x] = 0;
        for(var y = 0; y < matriz[x].length;y++){
            arreglo[x] += matriz[x][y]
        }
        arreglo[x]/=matriz[x].length;
    }
    var table = "<table><thead><th>Fila</th><th>Promedio</th></thead>";
    table += "<tr><td>---------</td><td>---------</td><td>---------</td></tr>";
    for(var x = 0;x<matriz.length;x++){
       table+="<tr><td>" + (x+1) + "</td>";
       table+="<td>" +  arreglo[x] + "</td>";
       table+="</tr>";
    }
    document.write(table);

}
function inverso(){
	var numin = prompt("Dame un número para invertir:");
    var num = numin.length;
    var numinv = "";
    while(num>=0){
        numinv += numein.charAt(num);
    }
    alert("El numero invertido es: " + numinv);
}

function solucion(){
    var persona = new Object();
    persona.edad = 19;
    persona.nombre =Itzel;
    var estudiante = new Object();
    estudiante[persona].curso="BD";
    alert("La persona ha sido registrada" + persona);
    window.print(persona);

}