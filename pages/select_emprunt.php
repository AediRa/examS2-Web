<?php
session_start();
$id_objet=$_GET['id_objet'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css-2/style.css">
    <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
    <script src="../assets/js/bootstrap.bundle.min.js"></script>
    <title>Document</title>
</head>
<body>
    <h3>Formulaire d'emprunt</h3>
    <form action="../INC/traitement/traitement_emprunt.php" method="post">
        <input type="number" name="jour">
        <input type="hidden" name="id_objet">
        <input type="submit" value="valider">
    </form>
</body>
</html>