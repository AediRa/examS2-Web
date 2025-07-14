<?php
if (isset($_POST['nom']) && isset($_POST['date']) && isset($_POST['genre']) && isset($_POST['email']) && isset($_POST['ville'])){
$nom=$_POST['nom'];
$date=$_POST['date'];
$genre=$_POST['genre'];
$email=$_POST['email'];
$ville=$_POST['ville'];
    $insert="INSERT INTO emprunt_membre (nom,date_de_naissance,email,ville,mdp,genre) VALUES ('%s','%s','%s','%s','%s','%s')";
        $inserts=sprintf($insert,$nom,$date,$genre,$email,$ville);
        mysqli_query($data, $inserts);
        header("Location: ../../pages/login.php");
}
?>