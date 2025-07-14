<?php
session_start();
include("../INC/fonction.php");
include("data.php");
$choix = 1;

if(isset($_SESSION['id_categorie'])){
    $choix = $_SESSION['id_categorie'];
}

$req = getObjet($data,$choix);
$cat = getcat($data);
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

Filtre par categorie :

<form action="../INC/traitement/traitement_filtre.php" method="post">


    <select name="categorie">
        <?php while($donnee2=mysqli_fetch_assoc($cat)){ ?>
            <option value="<?= $donnee2['id_categorie'] ?>">
                <?= $donnee2['nom_categorie'] ?>
            </option>
        <?php } ?>
    </select>


    <input type="submit" value="valider">  
</form>
    <h3>Liste des objets</h3>

    <table class="table">
        <tr>
            <th>Categorie</th>
            <th>Nom Objet</th>
            <th>Date de retour</th>
            <th>Disponibilite</th>
        </tr>
        
        <?php while($donnee=mysqli_fetch_assoc($req)){ ?>
            <tr>
                <td><?= $donnee['nom_categorie'] ?></td>
                <td><a href="select_emprunt.php?id_objet=<?= $donnee['id_objet'] ?>" class="btn btn-secondary" role="button">emprunter</a>  <a href="fiche_objet.php?id_obj=<?= $donnee['id_objet'] ?>"><?= $donnee['nom_objet'] ?></a></td>

                <td>
                
                    <?= $donnee['date_retour'] ?>

                </td>
            </tr>
        <?php } ?>
        
    </table>
<a href="login.php">retour</a>
</body>
</html>