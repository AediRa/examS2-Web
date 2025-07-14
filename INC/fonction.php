<?php
    function getObjet($data,$choix){
        $code="SELECT * from emprunt_v_liste_objet where id_categorie='$choix'";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }    
    function getcat($data){
        $code="SELECT * from emprunt_categorie_objet";
        $resultat = mysqli_query($data, $code);
        return $resultat;
    }
    
?>