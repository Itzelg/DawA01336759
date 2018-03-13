<?php
    function connect() {
        $ENV = "dev";
        if ($ENV == "dev") {
            $mysql = mysqli_connect("localhost","root","","m5c");

        } else  if ($ENV == "prod"){
            $mysql = mysqli_connect("localhost","blaing","awdvcft13509","m5c");
        }

        $mysql->set_charset("utf8");
        return $mysql;
    }

    function disconnect($mysql) {
        mysqli_close($mysql);
    }

    function login($user, $passwd) {
        $db = connect();
        if ($db != NULL) {


            $query="SELECT usuario
                    FROM usuario
                    WHERE usuario='" . $user . "' AND password='" . $passwd . "'";

            $results = mysqli_query($db, $query);
          

            if (mysqli_num_rows($results) > 0)  {

                mysqli_free_result($results);
                disconnect($db);
                return true;
            }
            return false;
        }
        return false;
    }

    function getTable($tableName) {
        $db = connect();
        if ($db != NULL) {


            $query='SELECT * FROM ' . $tableName;
            $query;

            $results = $db->query($query);

            disconnect($db);
            return $results;
//
        }
        return false;
    }

    function getUserRoles(){
        $db = connect();
        if($db != NULL){

            $query='SELECT u.user, u.nombre, r.nombre
                    FROM usuario u, usuario_rol ur, rol r
                    WHERE u.user = ur.usuario AND ur.idRol = r.id';
            $query;

            $results = $db->query($query);
            disconnect($db);
            return $results;
        }
        return false;

    }

function insertVisitante($nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $gradoEstudios, $genero){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    insert into visitante (nombre, apellidoPaterno, apellidoMaterno, fechaNacimiento, genero)
    values (?, ?, ?, ?, ?);
    ");
    $statement->bind_param("sssss", $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero);
    $statement->execute();
    $statement = mysqli_prepare($connection,"
    insert into visitante_gradoestudios values ((select idVisitante from visitante order by idVisitante desc limit 1), ?, current_date());
    ");
    $statement->bind_param("i", $gradoEstudios);
    $statement->execute();
    $statement = mysqli_prepare($connection,"
    insert into entrada (idVisitante) values ((select idVisitante from visitante order by idVisitante desc limit 1));
    ");
    $statement->execute();
    disconnect($connection);
}
function queryVisitor($idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios){
    $connection = connect();
    $statement = mysqli_prepare($connection,"
    select v.idVisitante as 'Número', v.nombre as 'Nombre', apellidoPaterno as 'Apellido paterno', apellidoMaterno as 'Apellido materno', fechaNacimiento as 'Fecha de nacimiento', genero as 'Género', g.nombre as 'Grado de estudios'
    from visitante as v, visitante_gradoestudios as vg, gradoestudios as g
    where (v.idVisitante = ? ".($idVisitante==""?"or 1":"").")
    and (v.nombre LIKE ? ".($nombre==""?"or 1":"").")
    and (apellidoPaterno = ? ".($apellidoPaterno==""?"or 1":"").")
    and (apellidoMaterno = ? ".($apellidoMaterno==""?"or 1":"").")
    and (fechaNacimiento = ? ".($fechaNacimiento==""?"or 1":"").")
    and (genero = ? ".($genero==""?"or 1":"").")
    and v.idVisitante = vg.idVisitante
    and vg.idGrado = g.idGrado
    and (g.idGrado = ? ".($gradoEstudios==""?"or 1":"").")
    ");
    $statement->bind_param("isssssi", $idVisitante, $nombre, $apellidoPaterno, $apellidoMaterno, $fechaNacimiento, $genero, $gradoEstudios);
    $statement->execute();
    $result = $statement->get_result();
    disconnect($connection);
    return $result;
}
function buildTableData($result){
    $table = "";
    if(mysqli_num_rows($result)>0){
        $fieldNumber = mysqli_num_fields($result);
        $table .= "<thead>";
        for($i = 0; $i < $fieldNumber; $i++){
            $table .= "<td>".mysqli_fetch_field_direct($result, $i)->name."</td>";
        }
        $table .= "</thead><tbody>";
        while($row = mysqli_fetch_assoc($result)){
            $table .= "<tr>";
            foreach($row as $data){
                $table .= "<td>$data</td>";
            }
            $table .= "</tr>";
        }
        $table .= "</tbody>";
    }else{
        echo "<thead><td>No hay resultados</td></thead>";
    }
    return $table;
}
function getLastIdVisitante(){
    $conn = connect();
    $sql = "SELECT idVisitante FROM visitante ORDER BY idVisitante DESC LIMIT 1";
    $results = mysqli_query($conn,$sql);
    if($results){
        return $results->fetch_assoc()["idVisitante"];
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
        return false;
    }
}
function _insertVisitante_Grado($idvisitante,$idgrado){
    $conn = connect();
    $sql = 'INSERT INTO  visitante_gradoestudios(idVisitante, idGrado, fecha) VALUES (' . $idvisitante . ',' . $idgrado . ',' . date("Y-m-d") . ');';
    if(mysqli_query($conn,$sql)){
        disconnect($conn);
        return true;
    }else{
        echo "<p>Error: " . $sql . "<br>" . mysqli_error($conn) ."</p>";
        disconnect($conn);
        return false;
    }
    disconnect($conn);
}

?>
