<?php include("partials/_header.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php include("regex.php"); ?>
<?php include("../partials/_nav.html");?>
<?php include("../partials/_lateral.html");?>

<?php
        include("utils.php");
        if(count($_POST)>0){
            if(!isset($_POST["client"]["correo"]) || !test($correo, $_POST["client"]["correo"]))
                $_POST["client"]["correo"] = null;
            if(!isset($_POST["client"]["client_grade"]) || !test($SCHOOLING, $_POST["client"]["client_grade"]))
                $_POST["client"]["client_grade"] = null;
        }
        if(count($_POST)>0
            && (($_POST["client"]["id"] == null) || test($ID, $_POST["client"]["id"]))
            && (($_POST["client"]["name"] == null) || test($NAME, $_POST["client"]["name"]))
            && (($_POST["client"]["rfc"] == null) || test($RFC, $_POST["client"]["rfc"]))
            && (($_POST["client"]["tel"] == null) || test($ID, $_POST["client"]["tel"]))
            && (($_POST["client"]["birthday"] == null) || test($DATE, $_POST["client"]["birthday"]))
            && (($_POST["client"]["correo"] == null) || test($CORREO, $_POST["client"]["correo"]))
            && (isset($_POST["actionTypeEntry"])) && (($_POST["actionTypeEntry"] == "Registrar Entrada") || ($_POST["actionTypeEntry"] == "Buscar Visitante"))
        ){
            $nulls = 0;
            foreach($_POST["client"] as $key => $value){
                if($value != null)
                    $info[$key] = htmlspecialchars($value);
                else{
                    $info[$key] = "";
                    if($key!="id")
                        $nulls++;
                }
            }
            if(isset($info)) {
                if ($_POST["actionTypeEntry"] == "Buscar Visitante") {
                    echo "<div class='row'><div class='col-12'><table class='table table-hover'>";
                    echo buildTableData(queryVisitor(
                                            $info["id"],
                                            $info["name"],
                                            $info["rfc"],
                                            $info["tel"],
                                            $info["birthday"],
                                            $info["correo"],
                                            $info["client_grade"]
                                            ));
                    echo "</table></div></div>";
                } else if ($_POST["actionTypeEntry"] == "Registrar Entrada") {
                    if($nulls == 0){
                        insertVisitante(
                            $info["name"],
                            $info["rfc"],
                            $info["tel"],
                            $info["birthday"],
                            $info["client_grade"],
                            $info["correo"]);
                    }
                }
            }
        }

?>
