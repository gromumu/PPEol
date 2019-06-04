drop database if exists siteol;

create database siteol;

use siteol;

#------------------------------------------------------------

#        Script MySQL.

#------------------------------------------------------------



#------------------------------------------------------------

# Table: Membre

#------------------------------------------------------------


CREATE TABLE Membre(

        idMembre      Int  Auto_increment  NOT NULL ,

        nom           Varchar (50) NOT NULL,

        prenom        Varchar (50) NOT NULL,

        pseudo       Varchar (50) NOT NULL,

        adresse       Varchar (50) NOT NULL,

        dateNaissance Date NOT NULL ,

        email         Varchar (50) NOT NULL ,

        mdpco           Varchar (50) NOT NULL

,CONSTRAINT Membre_PK PRIMARY KEY (idMembre)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: Services

#------------------------------------------------------------


CREATE TABLE Services(

        idService Int  Auto_increment  NOT NULL ,

        libelle   Varchar (50)

,CONSTRAINT Services_PK PRIMARY KEY (idService)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: Administrateurs

#------------------------------------------------------------


CREATE TABLE Administrateurs(

        idAdmin Int  Auto_increment ,

        nom     Varchar (50) ,

        prenom  Varchar (50) ,

        emailAdmin   Varchar (50),

        mdpAdmin varchar(50) NOT NULL

,CONSTRAINT Administrateurs_PK PRIMARY KEY (idAdmin)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: Newsletter

#------------------------------------------------------------


CREATE TABLE Newsletter(

        idNews      Int  Auto_increment  NOT NULL ,

        libelle     Varchar (50) NOT NULL ,

        dateNews    Date ,

        description Varchar (50) ,

        image       Varchar (100) ,

        idAdmin     Int NOT NULL

,CONSTRAINT Newsletter_PK PRIMARY KEY (idNews)


,CONSTRAINT Newsletter_Administrateurs_FK FOREIGN KEY (idAdmin) REFERENCES Administrateurs(idAdmin)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: categorie

#------------------------------------------------------------


CREATE TABLE categorie(

        idcategorie Int  Auto_increment  NOT NULL ,

        libelle     Varchar (50) NOT NULL

,CONSTRAINT categorie_PK PRIMARY KEY (idcategorie)

)ENGINE=InnoDB;

insert into categorie values(null, 'maillot adulte');
insert into categorie values(null, 'maillot enfant');


#------------------------------------------------------------

# Table: Produit

#------------------------------------------------------------


CREATE TABLE Produit(

        IdProduit   Int  Auto_increment  NOT NULL ,

        description  Varchar (50) ,

        categorie     Varchar (100) ,

        prix        Float ,

        idcategorie Int NOT NULL

,CONSTRAINT Produit_PK PRIMARY KEY (IdProduit)


,CONSTRAINT Produit_categorie_FK FOREIGN KEY (idcategorie) REFERENCES categorie(idcategorie)

)ENGINE=InnoDB;

insert into Produit values(null, 'taille S-M-L-XL', 'maillot adulte equipe masculine', 80, 1);
insert into Produit values(null, 'taille S-M-L', 'maillot enfant equipe masculine', 60, 2);
insert into Produit values(null, 'taille S-L-XL', 'maillot adulte equipe féminine', 80, 1);
insert into Produit values(null, 'taille M-L-XL', 'maillot enfant equipe féminine', 60, 2);




#------------------------------------------------------------

# Table: Payement

#------------------------------------------------------------


CREATE TABLE Payement(

        idpayement Int  Auto_increment  NOT NULL ,

        libelle    Varchar (50) ,

        donnees    Varchar (100)

,CONSTRAINT Payement_PK PRIMARY KEY (idpayement)

)ENGINE=InnoDB;


#------------------------------------------------------------

# Table: Message

#------------------------------------------------------------


CREATE TABLE Message(

        idMessage   Int  Auto_increment  NOT NULL ,

        nom         Varchar (50),

        prenom      Varchar (50),

        dateMessage Date ,

        email       Varchar (50),

        theme       Varchar (50) ,

        message     Varchar (100) ,

        idMembre    Int NOT NULL 

,CONSTRAINT Message_PK PRIMARY KEY (idMessage)

,CONSTRAINT Message_Membre_FK FOREIGN KEY (idMembre) REFERENCES Membre(idMembre)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: facture

#------------------------------------------------------------


CREATE TABLE facture(

        idfacture   Int  Auto_increment  NOT NULL ,

        datefacture Date ,

        montant     Float

,CONSTRAINT facture_PK PRIMARY KEY (idfacture)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table: photo

#------------------------------------------------------------


CREATE TABLE photo(

        idphoto   Int  Auto_increment  NOT NULL ,

        url       Varchar (100) ,

        type      Varchar (25) ,

        IdProduit Int NOT NULL

,CONSTRAINT photo_PK PRIMARY KEY (idphoto)


,CONSTRAINT photo_Produit_FK FOREIGN KEY (IdProduit) REFERENCES Produit(IdProduit)

)ENGINE=InnoDB;



#------------------------------------------------------------

# Table:     Acheter

#------------------------------------------------------------


CREATE TABLE Acheter(

        idMembre  Int NOT NULL ,

        IdProduit Int NOT NULL ,

        idfacture Int NOT NULL ,

        dateAchat Date ,

        quantite  Int

,CONSTRAINT Acheter_PK PRIMARY KEY (idMembre,IdProduit,idfacture)


,CONSTRAINT Acheter_Membre_FK FOREIGN KEY (idMembre) REFERENCES Membre(idMembre)

,CONSTRAINT Acheter_Produit0_FK FOREIGN KEY (IdProduit) REFERENCES Produit(IdProduit)

,CONSTRAINT Acheter_facture1_FK FOREIGN KEY (idfacture) REFERENCES facture(idfacture)

)ENGINE=InnoDB;


insert into Membre values(null,'Bidin', 'Romuald', 'gromumu', 'Allée de Paris', '1997-07-10', 'romuald.bidin@gmail.com', '1234');
insert into Membre values(3,'inconnu', 'inconnu', 'inconnu', 'inconnu', '1997-07-10', 'inconnu', '1234');

insert into Administrateurs values(null, 'Bidin', 'Romuald', 'romuald.bidin@gmail.com', '123456');

insert into Message values(null, "test nom", "test prenom", NOW(),"test email", "test theme", "test message", 1);

create view nb_produits as(
        select c.idcategorie, c.libelle, count(p.idproduit) as nb_produits_par_categorie
        from categorie c,  produit p
        where c.idcategorie=p.idcategorie
        group by c.libelle
);