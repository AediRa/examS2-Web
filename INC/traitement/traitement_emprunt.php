<?php
session_start();
if (isset($_POST['id_objet']) && isset($_POST['jour'])){
$_SESSION['id_obj_emprunt']=$_POST['id_objet'];
$_SESSION['nb_jour_emprunt']= $_POST['jour']; //+ now()->format('d');


echo($_POST['id_objet']);
//echo($_SESSION['nb_jour_emprunt']);
//header("Location: ../../pages/accueil.php");
}
?>