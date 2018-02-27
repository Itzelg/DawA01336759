<?php include("partials/_header.html"); ?>
<?php include("partials/_top_bar.html"); ?>
<?php include("html/entry.html");?>
<?php include("partials/_footer.html"); ?>
<?php include("upload.php"); ?>
<?php
    $usernum = isset($_POST["user"]["number"]) && is_numeric($_POST["user"]["number"]);
    $name = isset($_POST["user"]["name"]) && !is_numeric($_POST["user"]["name"]);
    $paternal = isset($_POST["user"]["paternal"]) && !is_numeric($_POST["user"]["paternal"]);
    $maternal = isset($_POST["user"]["maternal"]) && !is_numeric($_POST["user"]["maternal"]);
    $bday = isset($_POST["user"]["birthday"]);
    $rol = isset($_POST["user"]["rol"]);
    $gender = isset($_POST["user"]["gender"]);
    include("upload.php");

    if (isset($_POST["submit"])){
        if($usernum){
            include("modals/modal_num.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
        else if($name && $paternal && $maternal && $bday && $rol && $gender){
            include("modals/modal_new.php");
            echo "<script> $('#myModal').modal('show') </script>";

        }
        else{
            include("modals/modal_fail.php");
            echo "<script> $('#myModal').modal('show') </script>";
        }
    }
?>
