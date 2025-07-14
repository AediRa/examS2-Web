DROP TABLE IF EXISTS emprunt_membre,
                     emprunt_categorie_objet,
                     emprunt_objet,
                     emprunt_images_objet, 
                     emprunt_emprunt, 

/*!50503 set default_storage_engine = InnoDB */;
/*!50503 select CONCAT('storage engine: ', @@default_storage_engine) as INFO */;

CREATE TABLE emprunt_membre (
    id_membre      INT  AUTO_INCREMENT      ,
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
    id_categorie     INT   AUTO_INCREMENT  ,
    nom_categorie   VARCHAR(40) ,
    PRIMARY KEY (id_categorie)
);

CREATE TABLE emprunt_objet (
   id_objet       INT    AUTO_INCREMENT    ,
   id_categorie       INT       ,
   id_membre       INT         ,
   nom_objet      VARCHAR(54)    ,
   PRIMARY KEY (id_objet)
); 

CREATE TABLE emprunt_images_objet (
    id_image      INT    AUTO_INCREMENT     ,
    id_objet      INT          ,
    nom_image     VARCHAR(54)    ,
    PRIMARY KEY (id_image)
);

CREATE TABLE emprunt_emprunt (
    id_emprunt      INT    AUTO_INCREMENT      ,
    id_objet      INT         ,
    id_membre      INT       ,
    jours_emprunt INT ,
    date_emprunt   DATE       ,
    date_retour     DATE ,
    PRIMARY KEY (id_emprunt)
) 
;

--Insertion données--

INSERT INTO emprunt_membre (nom, date_de_naissance, genre, email, ville, mdp) VALUES 
('Jean Jacques', '1970-12-12', 'M', 'jeanjacques@gmail.com','Paris','jj'),
('Claire Dubois', '1985-04-22', 'F', 'clairedubois@gmail.com', 'Lyon', 'cd'),
('Marc Lefevre', '1992-09-15', 'M', 'marclefevre@gmail.com', 'Marseille', 'ml'),
('Sophie Martin', '2000-01-08', 'F', 'sophiemartin@gmail.com', 'Toulouse', 'sm');

INSERT INTO emprunt_categorie_objet (nom_categorie) VALUES
('esthetique'),
('bricolage'),
('mechanique'),
('cuisine');

INSERT INTO emprunt_objet (id_categorie, id_membre, nom_objet) VALUES
-- Membre 1
(1, 1, 'Sèche-cheveux'),
(1, 1, 'Lisseur'),
(2, 1, 'Perceuse'),
(2, 1, 'Tournevis électrique'),
(3, 1, 'Cric hydraulique'),
(3, 1, 'Clé à molette'),
(4, 1, 'Mixeur'),
(4, 1, 'Casserole'),
(1, 1, 'Brosse lissante'),
(2, 1, 'Scie sauteuse'),

-- Membre 2
(1, 2, 'Tondeuse à barbe'),
(1, 2, 'Miroir lumineux'),
(2, 2, 'Marteau'),
(2, 2, 'Pince multiprise'),
(3, 2, 'Pompe à vélo'),
(3, 2, 'Démonte-pneu'),
(4, 2, 'Blender'),
(4, 2, 'Batteur électrique'),
(1, 2, 'Fer à lisser'),
(2, 2, 'Clé Allen'),

-- Membre 3
(1, 3, 'Épilateur électrique'),
(1, 3, 'Brosse visage'),
(2, 3, 'Tournevis'),
(2, 3, 'Cloueur'),
(3, 3, 'Manomètre'),
(3, 3, 'Compresseur'),
(4, 3, 'Grille-pain'),
(4, 3, 'Bouilloire'),
(1, 3, 'Tondeuse à cheveux'),
(2, 3, 'Scie circulaire'),

-- Membre 4
(1, 4, 'Lotion visage'),
(1, 4, 'Pinceau maquillage'),
(2, 4, 'Niveau à bulle'),
(2, 4, 'Pistolet à colle'),
(3, 4, 'Clé dynamométrique'),
(3, 4, 'Démarreur batterie'),
(4, 4, 'Robot de cuisine'),
(4, 4, 'Planche à découper'),
(1, 4, 'Rasoir électrique'),
(2, 4, 'Tournevis plat');

INSERT INTO emprunt_emprunt (id_objet, id_membre, date_emprunt, date_retour) VALUES
(5, 2, '2025-06-20', '2025-06-25'),
(12, 1, '2025-06-18', '2025-06-24'),
(23, 3, '2025-07-01', '2025-07-10'),
(8, 4, '2025-07-03', '2025-07-08'),
(17, 2, '2025-06-29', '2025-07-04'),
(33, 1, '2025-07-05', '2025-07-12'),
(29, 4, '2025-06-30', '2025-07-03'),
(14, 3, '2025-07-07', '2025-07-13'),
(2, 1, '2025-07-02', '2025-07-06'),
(20, 3, '2025-07-01', '2025-07-09');

CREATE OR REPLACE VIEW emprunt_v_categorie_objet AS SELECT nom_categorie,emprunt_categorie_objet.id_categorie as id_categorie , id_objet,nom_objet,id_membre from emprunt_objet JOIN emprunt_categorie_objet ON emprunt_categorie_objet.id_categorie=emprunt_objet.id_categorie;
CREATE OR REPLACE VIEW emprunt_v_liste_objet AS SELECT nom_categorie,nom_objet,emprunt_emprunt.id_objet as id_objet,id_categorie,date_emprunt,date_retour,emprunt_emprunt.id_membre as id_membre,id_emprunt , jours_emprunt  FROM emprunt_emprunt JOIN emprunt_v_categorie_objet ON emprunt_emprunt.id_objet=emprunt_v_categorie_objet.id_objet;