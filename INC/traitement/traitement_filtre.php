<?php
session_start();
if (isset($_POST['categorie'])){
$_SESSION['id_categorie']=$_POST['categorie'];
//echo($_SESSION['id_categorie']);
header("Location: ../../pages/accueil.php");
}
?>