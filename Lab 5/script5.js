function validarPassword(){
    var clave1 = document.forms["clave"]["clave1"].value;
    var clave2 = document.forms["clave"]["clave2"].value;
    if(clave1.length == 0){
        alert("No has insertado una contraseña.");
        return 0;
    }else if(clave2 !== clave1){
        alert("La segunda contraseña no es igual a la primera.");
        return 0;
    }
    mayus = 0;
    num = 0;
    if(clave1.length >= 6){
        for(var i=0;i<clave1.length;i++){
            if('0123456789'.indexOf(clave1.charAt(i)) !== -1){
                num+=1;
            }else if(clave1.charAt(i) == clave1.charAt(i).toUpperCase()){
                mayus+=1;
            }
        }
        if(mayus < 1){
            alert("La contraseña debe tener al menos una mayuscula.");
            return 0;
        }
        if(num < 1){
            alert("La contraseña debe tener al menos un número.");
            return 0;
        }
        alert("¡Contraseña correcta!");
        return 0;
    }else{
        alert("La contraseña es incorrecta.");
        return 0;
    }
    alert("Error")
    return 0;
}
function productos(){
    var chocolates = document.forms["numproductos"]["chocolates"].value;
    var gomitas = document.forms["numproductos"]["gomitas"].value;
    var paletas = document.forms["numproductos"]["paletas"].value;
    if(chocolates === "" && gomitas == "" && paletas == ""){
        alert("No compraste nada.");
        return 0;
    }
    if(chocolates) < 0 || gomitas < 0 || paletas < 0){
        alert("No puedes ingresar numeros menores a 0.");
        return;
    }
    if(chocolates.match(/^[0-9]+$/) == null|| gomitas.match(/^[0-9]+$/) == null || paletas.match(/^[0-9]+$/) == null){
        alert("Favor de solo insertar numeros.");
        return;
    }
    chocolates = parseInt(chocolates);
    gomitas = parseInt(gomitas);
    paletas = parseInt(paletas)
    if(chocolates > 100){
        alert("No hay suficientes chocolates en el almacen.");
        return;
    }else if(gomitas > 100){
        alert("No hay suficientes gomitas en el almacen.");
        return;
    }else if(paletas > 100){
        alert("No hay suficientes paletas en el almacen");
        return;
    }
    sum1 = (chocolates*20) + (gomitas*15) + (platanos*10);
    sum2 = sum1 + (sum1*.10);
    alert("Tú total es de: \n" + sum1 + " más el 10% de IVA: " + sum2);
}