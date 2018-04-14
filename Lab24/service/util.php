<?php
    function connectDb(){
        $servername = "localhost";
        $username = "karyrs";
        $password = "";
        $dbname = "daw";
    
        $mysql = mysqli_connect($servername, $username, $password, $dbname);
        $mysql->set_charset("utf8");
    
        //Check connection
        if (!$mysql){
            die("Connection failed: ".mysqli_connect_error());
        }
    
        return $mysql;
    }
    
    function closeDb($mysql){
        mysqli_close($mysql);
    }
    
    function getEventosTable() {
        $db = connectDb();
        //Specification of the SQL query
        $query='SELECT * FROM evento';
         // Query execution; returns identifier of the result group
        $registros = $db->query($query);

        $table = '<table class="striped">
            <thead>
              <tr>
                  <th>Titulo</th>
                  <th>Descripción</th>
                  <th>Lugar</th>
                  <th>Fecha de Inicio</th>
                  <th>Hora de Inicio</th>
              </tr>
            </thead>
            <tbody>';
        // cycle to explode every line of the results
        while ($row = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
            $table .= '
            <tr>
                <td>'.$row["tituloEvento"].'</td>
                <td>'.$row["descripcionEvento"].'</td>
                <td>'.$row["lugarEvento"].'</td>
                <td>'.$row["fechaInicio"].'</td>
                <td>'.$row["horaInicio"].'</td>
            </tr>';

        }
        // it releases the associated results
        mysqli_free_result($registros);

        closeDb($db);

        $table .= "</tbody></table>";

        return $table;
    }
    
    function getEvento($idEvento){
        $db = connectDb();
        //Specification of the SQL query
        $query='SELECT * FROM evento WHERE idEvento="'.$idEvento.'"';
         // Query execution; returns identifier of the result group
        $registros = $db->query($query);
        
        $card='<div class="row">
        <div class="col s12 m6">
          <div class="card blue-grey darken-1">';

        // cycle to explode every line of the results
        while ($row = mysqli_fetch_array($registros, MYSQLI_BOTH)) {
            $card .= '
            <div class="card-content white-text">
            <span class="card-title">'.$row["tituloEvento"].'</span>
            <p>
                <td>'.$row["descripcionEvento"].'</td>
            </p>
            </div>
            <div class="card-action">
             <a href="#">'.$row["lugarEvento"].'</a>
             <a href="#">'.$row["fechaInicio"].'</a>
             <a href="#">'.$row["horaInicio"].'</a>
            </div>';

        }
        // it releases the associated results
        mysqli_free_result($registros);

        closeDb($db);

        $card .= "</div></div></div>";

        return $card;
    }
?>