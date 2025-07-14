<?php
    session_start();
    include('../../pages/data.php');
    if(isset($_FILES['media']) && isset($_POST['description']) ){
        
        $uploadDir = '../../assets/media/';
        $maxSize = 15 * 1024 * 1024; // 2 Mo
        $allowedMimeTypes = ['video/mp4','image/jpg','image/jpeg','image/png'];
        // Vérifie si un fichier est soumis
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['media'])) {
        $file = $_FILES['media'];
        if ($file['error'] !== UPLOAD_ERR_OK) {
        die('Erreur lors de l’upload : ' . $file['error']);
        }
        // Vérifie la taille
        if ($file['size'] > $maxSize) {
        die('Le fichier est trop volumineux.');
        }
        // Vérifie le type MIME avec `finfo`
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
        $mime = finfo_file($finfo, $file['tmp_name']);
        finfo_close($finfo);
        if (!in_array($mime, $allowedMimeTypes)) {
        die('Type de fichier non autorisé : ' . $mime);
        }
        // renommer le fichier
        $originalName = pathinfo($file['name'], PATHINFO_FILENAME);
        $extension = pathinfo($file['name'], PATHINFO_EXTENSION);
        $newName = $originalName . '_' . uniqid() . '.' . $extension;
        //Déplace le fichier
        if (move_uploaded_file($file['tmp_name'],$uploadDir.$newName)) {
        echo "Fichier uploadé avec succès : ". $newName;
        } else {
        echo "Échec du déplacement du fichier.";
        echo $uploadDir . $newName;
        }
        } else {
        echo "Aucun fichier reçu.";
        }
            
        $pdp=$newName;
        $user=$_SESSION['id'];
        $dsc=$_POST['description'];
        $insert="INSERT INTO ig_post(pic,id_user,descriptions) VALUES ('%s','%s','%s')";
        $insert=sprintf($insert,$pdp,$user,$dsc);
        $resultat = mysqli_query($data, $insert);
        header("Location: ../../pages/publier.php");
        exit;
    }
?>