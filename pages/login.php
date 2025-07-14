<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Style.css">
    <title>Document</title>
</head>
<body>
<?php
if (isset($_GET['erreur'])){
?>
<h3>Erreur</h3>
<?php
}
?>
    <div class="titre">
        <h1>ACCEDER AU COMPTE</h1>
        <div class="web">
            <a href="inscription.php">Inscription</a>
        </div>
    </div>
    <div class="login">
        <form action="../INC/traitement/traitement_login.php" method="post">
            <p>Entrer votre Adresse mail : <input type="text" name="log_email"></p>
            <p>Entrer votre Mot de passe : <input type="password" name="log_motdepasse"></p>
            <input type="hidden" name="connecte">
            <input type="submit" value="Valider">
        </form>
    </div>
    
</body>
</html>