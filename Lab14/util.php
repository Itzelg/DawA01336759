<?
//Conectar base de datos
function conectDb(){
	$servername = "localhost";
	$username = "root";
	$password = "";
	$dbname = "lab14";
	$con = mysqli_connect($servername, $username, $password, $dbname);
	//revisa la conexión
	if (!$con) {
		die("Conection failed " . mysqli_connect_error());
	}
	$con->set_charset("utf8");
	return $con;
}
//Cerrar Bases de datos
function closeDb($mysql){
	mysqli_close($mysql);
}
//Funcion para obtener todos los objetos de una base de datos
function getChoc($choc_name=""){
	$conn = conectDb();
	$sql = "SELECT name , units, quantity, price, country
					FROM   Choc";
	if ($choc_name != "") {
		$sql .= " WHERE name LIKE '%".$choc_name."%'";
	}
	$result = mysqli_query($conn, $sql);
	$html = "";
  if ( mysqli_num_rows($result) > 0) {
    //Imprimo la info
    $html .= ' <br> <br> <br>
    <h1 class="text-center">Table Chocolates</h1>
    <table border="1" cellspacing=“4” cellpadding=“2” width="300px" align="center">
      <tr>
        <th>Name</th>
        <th>Units</th>
        <th>Quantity</th>
        <th>Price</th>
        <th>Country</th>
      </tr>';
    while ($row = mysqli_fetch_assoc($result)) {
      $html .= '
        <tr border="1" cellspacing=“4” cellpadding=“2” width="300px" align="center">
          <td>'. $row["name"].'</td>
          <td>'. $row["units"].'</td>
          <td>'. $row["quantity"].'</td>
          <td>'. $row["price"].'</td>
          <td>'. $row["country"].'</td>
        </tr>';
    }
		//echo '</table> <br> <br> <br>';
  }
	return $html;
}
//Funcion para consulta 2
function getCheapOrExpensiveChocs($cheap_price){
	$conn = conectDb();
	$sql = "SELECT name, units, quantity, price, country
					FROM Choc
					WHERE price <- '".$cheap_price."'";
 $result = mysqli_query($conn, $sql);
 closeDb($conn);
 return $result;
}
?>
