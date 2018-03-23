<?
 $hora =  $_SESSION["ultimoAcceso_mc"];
 $ahora = date("Y-n-j H:i:s");
 $tiempo_transcurrido = (strtotime($ahora)-strtotime($hora));

 //comparamos el tiempo transcurrido
 if($tiempo_transcurrido >= 6480) {

 // destruyo la sesión
 unset($_SESSION);
 }
?>
