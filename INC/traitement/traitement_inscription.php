<?php
include("../../pages/data.php");
if (isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['genre']) && isset($_POST['email']) && isset($_POST['ville']) && isset($_POST['motdepasse'])){
$nom=$_POST['nom'];
$date=$_POST['date'];
$genre=$_POST['genre'];
$email=$_POST['email'];
$ville=$_POST['ville'];
$mdp=$_POST['motdepasse'];

    $insert="INSERT INTO emprunt_membre (nom,date_de_naissance,genre,email,ville,mdp) VALUES ('%s','%s','%s','%s','%s','%s')";
        $inserts=sprintf($insert,$nom,$date,$genre,$email,$ville,$mdp);
        mysqli_query($data, $inserts);
        header("Location: ../../pages/login.php");
}
?>