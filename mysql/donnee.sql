DROP DATABASE IF EXISTS emprunt;
CREATE DATABASE IF NOT EXISTS emprunt;
USE emprunt;

SELECT 'CREATING DATABASE STRUCTURE' as 'INFO';

DROP TABLE IF EXISTS emprunt_membre,
                     emprunt_categorie_objet,
                     emprunt_objet,
                     emprunt_images_objet, 
                     emprunt_emprunt, 

/*!50503 set default_storage_engine = InnoDB */;
/*!50503 select CONCAT('storage engine: ', @@default_storage_engine) as INFO */;

CREATE TABLE emprunt_membre (
    id_membre      INT        ,
    date_de_naissance  DATE           ,
    nom  VARCHAR(54)     ,
    email   VARCHAR(56)     ,
    ville   VARCHAR(56)    ,
    mdp   VARCHAR(56)     ,
    genre      ENUM ('M','F')  , 
    image_profil VARCHAR(56)  ,
    PRIMARY KEY (id_membre)
);

CREATE TABLE emprunt_categorie_objet (
    id_categorie     INT     ,
    nom_categorie   VARCHAR(40) ,
    PRIMARY KEY (id_categorie)
);

CREATE TABLE emprunt_objet (
   id_objet       INT        ,
   id_categorie       INT       ,
   id_membre       INT         ,
   nom_objet      VARCHAR(54)    ,
   PRIMARY KEY (id_objet)
); 

CREATE TABLE emprunt_images_objet (
    id_image      INT         ,
    id_objet      INT          ,
    nom_image     VARCHAR(54)    ,
    PRIMARY KEY (id_image)
);

CREATE TABLE emprunt_emprunt (
    id_emprunt      INT          ,
    id_objet      INT         ,
    id_membre      INT       ,
    
    date_emprunt   DATE       ,
    date_retour     DATE ,
    PRIMARY KEY (id_emprunt)
) 
; 