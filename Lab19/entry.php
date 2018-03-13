<?php include("partials/_header.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php include("regex.php"); ?>

<?php
        include("utils.php");
        if(count($_POST)>0){
            if(!isset($_POST["client"]["gender"]) || !test($GENDER, $_POST["client"]["gender"]))
                $_POST["client"]["gender"] = null;
            if(!isset($_POST["client"]["client_grade"]) || !test($SCHOOLING, $_POST["client"]["client_grade"]))
                $_POST["client"]["client_grade"] = null;
        }
        if(count($_POST)>0
            && (($_POST["client"]["number"] == null) || test($NUMBER, $_POST["client"]["number"]))
            && (($_POST["client"]["name"] == null) || test($NAME, $_POST["client"]["name"]))
            && (($_POST["client"]["paternal"] == null) || test($NAME, $_POST["client"]["paternal"]))
            && (($_POST["client"]["maternal"] == null) || test($NAME, $_POST["client"]["maternal"]))
            && (($_POST["client"]["birthday"] == null) || test($DATE, $_POST["client"]["birthday"]))
            && (($_POST["client"]["gender"] == null) || test($GENDER, $_POST["client"]["gender"]))
            && (isset($_POST["actionTypeEntry"])) && (($_POST["actionTypeEntry"] == "Registrar Entrada") || ($_POST["actionTypeEntry"] == "Buscar Visitante"))
        ){
            $nulls = 0;
            foreach($_POST["client"] as $key => $value){
                if($value != null)
                    $info[$key] = htmlspecialchars($value);
                else{
                    $info[$key] = "";
                    if($key!="number")
                        $nulls++;
                }
            }
            if(isset($info)) {
                if ($_POST["actionTypeEntry"] == "Buscar Visitante") {
                    echo "<div class='row'><div class='col-12'><table class='table table-hover'>";
                    echo buildTableData(queryVisitor(
                                            $info["number"],
                                            $info["name"],
                                            $info["paternal"],
                                            $info["maternal"],
                                            $info["birthday"],
                                            $info["gender"],
                                            $info["client_grade"]
                                            ));
                    echo "</table></div></div>";
                } else if ($_POST["actionTypeEntry"] == "Registrar Entrada") {
                    if($nulls == 0){
                        insertVisitante(
                            $info["name"],
                            $info["paternal"],
                            $info["maternal"],
                            $info["birthday"],
                            $info["client_grade"],
                            $info["gender"]);
                    }
                }
            }
        }

?>
