<?php include("partials/_header.html"); ?>
<?php include("partials/_funciones.html"); ?>
<?php include("partials/_footer.html"); ?>

<?php
session_start();
  $choc_name = isset($_POST["chocolates"]) && ($_POST["chocolates"]);
  $R1 = isset($_POST["customRadioInline1"]);
  $R2 = isset($_POST["customRadioInline2"]);
  if($_SERVER['REQUEST_METHOD'] == 'POST'){
    require_once "util.php";
    $_SESSION['chocolates'] = $_POST["chocolates"];
    echo 'R1: '.$R1.'<br>';
    echo 'R2: '.$R2.'<br>';
    echo getChoc($_SESSION['chocolates']);
  }
 ?>
