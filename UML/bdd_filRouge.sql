CREATE DATABASE test_filrouge ;
USE test_filrouge ;

CREATE TABLE produit(
   code_produit INT AUTO_INCREMENT,
   nom_produit VARCHAR(50) NOT NULL,
   description_produit VARCHAR(300),
   prix_produit DECIMAL(5,2) NOT NULL,
   PRIMARY KEY(code_produit)
);

CREATE TABLE Catégorie(
   id_categorie INT AUTO_INCREMENT,
   id_categorie_1 INT NOT NULL,
   PRIMARY KEY(id_categorie),
   FOREIGN KEY(id_categorie_1) REFERENCES Catégorie(id_categorie)
);

CREATE TABLE role(
   id INT AUTO_INCREMENT,
   particulier VARCHAR(50),
   gestionnaire VARCHAR(50),
   admin VARCHAR(50),
   profesionnel VARCHAR(50),
   PRIMARY KEY(id)
);

CREATE TABLE client(
   num_client INT AUTO_INCREMENT,
   nom_client VARCHAR(50) NOT NULL,
   prenom_client VARCHAR(50) NOT NULL,
   adresse_client VARCHAR(50) NOT NULL,
   mail_client VARCHAR(100),
   tel_client VARCHAR(10) NOT NULL,
   id INT NOT NULL,
   PRIMARY KEY(num_client),
   FOREIGN KEY(id) REFERENCES role(id)
);

CREATE TABLE commande(
   num_commande INT AUTO_INCREMENT,
   date_commande DATE NOT NULL,
   montant_commande DECIMAL(6,2),
   num_client INT NOT NULL,
   PRIMARY KEY(num_commande),
   FOREIGN KEY(num_client) REFERENCES client(num_client)
);

CREATE TABLE catalogue(
   id_catalogue INT AUTO_INCREMENT,
   theme_catalogue VARCHAR(50),
   id_categorie INT NOT NULL,
   PRIMARY KEY(id_catalogue),
   FOREIGN KEY(id_categorie) REFERENCES Catégorie(id_categorie)
);

CREATE TABLE facture(
   id_paiement INT AUTO_INCREMENT,
   date_paiement DATE,
   nom_client VARCHAR(50),
   montant_facture DECIMAL(6,2),
   bordereau VARCHAR(300),
   num_client INT NOT NULL,
   num_commande INT NOT NULL,
   PRIMARY KEY(id_paiement),
   FOREIGN KEY(num_client) REFERENCES client(num_client),
   FOREIGN KEY(num_commande) REFERENCES commande(num_commande)
);

CREATE TABLE consultation(
   num_client INT,
   code_produit INT,
   PRIMARY KEY(num_client, code_produit),
   FOREIGN KEY(num_client) REFERENCES client(num_client),
   FOREIGN KEY(code_produit) REFERENCES produit(code_produit)
);

CREATE TABLE composition_catalogue(
   code_produit INT,
   id_catalogue INT,
   PRIMARY KEY(code_produit, id_catalogue),
   FOREIGN KEY(code_produit) REFERENCES produit(code_produit),
   FOREIGN KEY(id_catalogue) REFERENCES catalogue(id_catalogue)
);

CREATE TABLE selection(
   code_produit INT,
   num_commande INT,
   quantite INT NOT NULL,
   PRIMARY KEY(code_produit, num_commande),
   FOREIGN KEY(code_produit) REFERENCES produit(code_produit),
   FOREIGN KEY(num_commande) REFERENCES commande(num_commande)
);
