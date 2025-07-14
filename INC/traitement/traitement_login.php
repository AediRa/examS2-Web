<?php
include('../pages/data.php');

    session_start();

    if(isset($_POST['log_email']) && isset($_POST['log_motdepasse'])){
    $mail=$_POST['log_email'];
    $password=$_POST['log_motdepasse'];
    
    $_SESSION['mail']=$_POST['log_email'];
    $_SESSION['password']=$_POST['log_motdepasse'];

    $code="SELECT * FROM emprunt_membre WHERE email='$mail' and mdp='$password'";

    $resultat = mysqli_query($data, $code);
    $donnee = mysqli_fetch_assoc( $resultat );
    $_SESSION['id'] = $donnee['id_membre'];
    $_SESSION['Nom'] = $donnee['nom'];
    $ligne=mysqli_num_rows($resultat);

    if($ligne!=0){
        header("Location: ../../pages/login.php?erreur");
        exit;
    }
    else{
        header("Location: ../../pages/accueil.php");
        exit;
    }
    $donnees = mysqli_fetch_assoc($resultat);
    }

?>