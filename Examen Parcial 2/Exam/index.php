<?php
	require_once("modelo.php");
	include("partials/_header.html");
	include("index.html");
  include("validation.php");

  if($contenido=="cons1"){
    include("cons1.php");
  }else if($contenido=="cons2"){
    include("cons2.php");
  } else if($contenido=="cons2"){
    include("cons3.php");

  }
  include("partials/_footer.html");

?>
