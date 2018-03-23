<?php

function connect() {
    $ENV = "dev";
    if ($ENV == "dev") {
      $mysql = mysqli_connect("localhost","itzelg","", "c9","3306");
    }
    $mysql->set_charset("utf8");
    return $mysql;
}

function disconnect($mysql) {
    mysqli_close($mysql);
}
	function agregarEntrada($nums,$hora){
+		$db = conecta();
+
+		$query='INSERT INTO entrada (nums,hora,estado) VALUES (?,?,?)';
+
+	    if (!($statement = $db->prepare($query))) {
+	    	die("Preparation failed: (" . $db->errno . ") " . $db->error);
+	    }
+	    // Binding statement http_parse_params(	
+
+	    if (!$statement->bind_param("si", $nums, $hora)) {
+	        die("Parameter vinculation failed: (" . $statement->errno . ") " . $statement->error); 
+	    }
+	    // Executing the statement
+	    if (!$statement->execute()) {
+	        die("Execution failed: (" . $statement->errno . ") " . $statement->error);
+	     }
+		desconecta($db);

		//$query='INSERT INTO nums(estado) VALUES ("'.$rfc.'","'.$idRol.'","'.$idUR.'")';
        //$db->query($query2);

        //disconnectDb($db);
+	}

	//function succono(){
		
	//		if($nums==4 8 15 16 23 42){
         //   estado($_POST["SUCCESS"]);
        //    }
        //    else{
        //      estado($_POST["SYSTEM FAILURE"]);
        //      } 
	//}

    function totalEstado(){
	  $entradas = ['SUCCESS','SYSTEM FAILURE'];
		$db=conecta();

	//SUCCESS

		$query = '	SELECT count(*)
					FROM entrada
					WHERE estado = 0';
		$result = mysqli_query($db,$query);
		$fila = mysqli_fetch_array($result,MYSQLI_BOTH);
		echo "<br><h5>En total hay " . $fila[0] . " eventos SUCCESS</h5><br>";

		//FAIL

    $query = '	SELECT count(*)
					FROM entrada
					WHERE estado = 1';
		$result = mysqli_query($db,$query);
		$fila = mysqli_fetch_array($result,MYSQLI_BOTH);
		echo "<br><h5>En total hay " . $fila[0] . " eventos SYSTEM FAILURE</h5><br>";
		desconecta($db);
  	}


    function totalFail(){
    $entradas = ['SUCCESS','SYSTEM FAILURE'];
    $db=conecta();

    $query = '	SELECT *
          FROM entrada ORDER BY hora
          WHERE estado = 1';
    $result = mysqli_query($db,$query);
    $fila = mysqli_fetch_array($result,MYSQLI_BOTH);
    echo "<br><h5>Hora de SYSTEM FAILURE</h5><br>" . $result;
    desconecta($db);
    }
    
    


    function selectEntradas(){
		$db=connect();
		$query = 'SELECT * FROM entrada ORDER BY hora';
	  $result = mysqli_query($db,$query);
		disconnect($db);
		return $result;
    	
    }

	function showEntry(){
		$result = selectEntradas();
		$entradas = ['SUCCESS','SYSTEM FAILURE'];
		echo "<table class=\"bordered\">";
		echo "<tr>";
		echo "<th>Id entrada</th>";
		echo "<th>Numeros</th>";
		echo "<th>Hora</th>";
		echo "<th>Estado</th>";
		echo "</tr>";
		while($fila = mysqli_fetch_array($result,MYSQLI_BOTH)){
		echo "<tr>";
		echo "<td>" . $fila["idEntrada"] . "</td>";
   	echo "<td>" . $fila["nums"] . "</td>";
		echo "<td>" . $fila["hora"] . "</td>";
		echo "<td>" . $entradas[$fila["estado"]] . "</td>";
		echo "<td></td>";
		echo "</tr>";
		}
		echo "</table>";
	}


?>
