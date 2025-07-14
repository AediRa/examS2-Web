<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Style.css">
    <title>Document</title>
</head>
<body>
    <div class="titre">
        <h1>ACCEDER AU COMPTE</h1>
        <div class="web">
            <a href="accueil.php">Inscription</a>
        </div>
    </div>
    <div class="login">
        <form action="../INC/traitement.php" method="post">
            <p>Entrer votre Adresse mail : <input type="text" name="log_email"></p>
            <p>Entrer votre Mot de passe : <input type="password" name="log_motdepasse"></p>
            <input type="hidden" name="connecte">
            <input type="submit" value="Valider">
        </form>
    </div>
    
</body>
</html>