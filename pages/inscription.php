<?php 

include('data.php');
include('../INC/fonction.php');

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Style.css">
    <title>Document</title>
</head>
<body>
    <h3>Formulaire d inscription</h3>
    <form action="../INC/traitement/traitement_inscription.php" method="post">
        <p>Nom : <input type="text" name="nom"></p>
        <p>Date de naissance : <input type="date" name="date"></p>
        <p>Genre : </p>

        <select name="genre">
                <option value="M">
                    Homme
                </option>
                <option value="F">
                    Femme
                </option>
        </select>

        <p>Email : <input type="mail" name="email"></p>
        <p>Ville : <input type="text" name="ville"></p>
        <p>Mot de passe : <input type="password" name="motdepasse"></p>
        <input type="submit" value="valider">
    </form>

    <a href="login.php">retour</a>
</body>
</html>


