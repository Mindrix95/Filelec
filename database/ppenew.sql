DROP DATABASE IF EXISTS ppe;

CREATE DATABASE IF NOT EXISTS ppe;
USE ppe;
# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER
 (
   MAIL VARCHAR(128) NOT NULL  ,
   MDP VARCHAR(200) NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  ,
   ADRESSE VARCHAR(128) NULL  ,
   ISADMIN INTEGER NULL  
   , PRIMARY KEY (MAIL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SERVICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SERVICE
 (
   ID INTEGER NOT NULL  ,
   LIBELLE VARCHAR(128) NULL  ,
   DESCRI TEXT NULL  ,
   IMAGE VARCHAR(128) NULL  ,
   PRIX REAL(5,2) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PRODUIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PRODUIT
 (
   ID INTEGER NOT NULL  ,
   LIBELLE VARCHAR(128) NULL  ,
   DESCRI TEXT NULL  ,
   IMAGE VARCHAR(200) NULL  ,
   PRIX REAL(5,2) NULL  ,
   QTT INTEGER NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TECHNICIENS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TECHNICIENS
 (
   IDTEC INTEGER NOT NULL  ,
   NOM VARCHAR(128) NULL  ,
   PRENOM VARCHAR(128) NULL  
   , PRIMARY KEY (IDTEC) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMANDES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMANDES
 (
   REFCOM INTEGER NOT NULL  ,
   MAIL VARCHAR(128) NOT NULL  ,
   DTECOM DATE NULL  ,
   DATELIVRE TIME NULL  ,
   ETAT VARCHAR(128) NULL  
   , PRIMARY KEY (REFCOM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE COMMANDES
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_COMMANDES_USER
     ON COMMANDES (MAIL ASC);

# -----------------------------------------------------------------------------
#       TABLE : PANIER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PANIER
 (
   REFCOM INTEGER NOT NULL  ,
   ID INTEGER NOT NULL  ,
   QTT INTEGER NULL  ,
   REMISE REAL(5,2) NULL  
   , PRIMARY KEY (REFCOM,ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE PANIER
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_PANIER_COMMANDES
     ON PANIER (REFCOM ASC);

CREATE  INDEX I_FK_PANIER_PRODUIT
     ON PANIER (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : NECESSITE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS NECESSITE
 (
   REFCOM INTEGER NOT NULL  ,
   ID INTEGER NOT NULL  
   , PRIMARY KEY (REFCOM,ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE NECESSITE
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_NECESSITE_COMMANDES
     ON NECESSITE (REFCOM ASC);

CREATE  INDEX I_FK_NECESSITE_SERVICE
     ON NECESSITE (ID ASC);

# -----------------------------------------------------------------------------
#       TABLE : INTERVENIR
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS INTERVENIR
 (
   IDTEC INTEGER NOT NULL  ,
   ID INTEGER NOT NULL  ,
   DATEHEUREDEB DATETIME NULL  ,
   DATEHEUREFIN DATETIME NULL  
   , PRIMARY KEY (IDTEC,ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       INDEX DE LA TABLE INTERVENIR
# -----------------------------------------------------------------------------


CREATE  INDEX I_FK_INTERVENIR_TECHNICIENS
     ON INTERVENIR (IDTEC ASC);

CREATE  INDEX I_FK_INTERVENIR_SERVICE
     ON INTERVENIR (ID ASC);


# -----------------------------------------------------------------------------
#       CREATION DES REFERENCES DE TABLE
# -----------------------------------------------------------------------------


ALTER TABLE COMMANDES 
  ADD FOREIGN KEY FK_COMMANDES_USER (MAIL)
      REFERENCES USER (MAIL) ;


ALTER TABLE PANIER 
  ADD FOREIGN KEY FK_PANIER_COMMANDES (REFCOM)
      REFERENCES COMMANDES (REFCOM) ;


ALTER TABLE PANIER 
  ADD FOREIGN KEY FK_PANIER_PRODUIT (ID)
      REFERENCES PRODUIT (ID) ;


ALTER TABLE NECESSITE 
  ADD FOREIGN KEY FK_NECESSITE_COMMANDES (REFCOM)
      REFERENCES COMMANDES (REFCOM) ;


ALTER TABLE NECESSITE 
  ADD FOREIGN KEY FK_NECESSITE_SERVICE (ID)
      REFERENCES SERVICE (ID) ;


ALTER TABLE INTERVENIR 
  ADD FOREIGN KEY FK_INTERVENIR_TECHNICIENS (IDTEC)
      REFERENCES TECHNICIENS (IDTEC) ;


ALTER TABLE INTERVENIR 
  ADD FOREIGN KEY FK_INTERVENIR_SERVICE (ID)
      REFERENCES SERVICE (ID) ;

