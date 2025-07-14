<?php
    function getObjet($data){
        $code="SELECT * emprunt_objet(YEAR, '$birth', CURDATE()) AS age";
        $resultat = mysqli_query($data, $code);
        $age = mysqli_fetch_assoc($resultat);
        return $age['age'];
    }    

?>