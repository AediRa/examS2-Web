<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../Assets/CSS/Style.css">
    <link rel="stylesheet" href="../assets/css-2/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
<div class="container-fluid">
        <?php
        if (isset($_GET['erreur'])){
        ?>
        <h3>Erreur</h3>
        <?php
        }
        ?><div class="mb-3">

            <div class="titre">
                <h1>ACCEDER AU COMPTE</h1>
                <div class="web">
                    <a href="inscription.php">Inscription</a>
                </div>
            </div>

            <div class="login">
                <form action="../INC/traitement/traitement_login.php" method="post">
                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Entrer votre Adresse mail :</label>
                    <input type="text" name="log_email">
                </div>

                <div class="mb-3">
                    <label for="exampleFormControlInput1" class="form-label">Entrer votre Mot de passe :</label>
                    <input type="password" name="log_motdepasse">
                </div>
                
                <div class="mb-3">
                    <input type="submit" value="Valider">
                </div>
                </form>
            </div>
    </div>
</body>
</html>