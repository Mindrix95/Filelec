DROP DATABASE IF EXISTS ppe;

CREATE DATABASE IF NOT EXISTS ppe;
USE ppe;
# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS USER
 (
   MAIL DB_TEXT, 255 NOT NULL  ,
   MDP DB_TEXT, 255 NULL  ,
   NOM DB_TEXT, 255 NULL  ,
   PRENOM DB_TEXT, 255 NULL  ,
   ADRESSE DB_TEXT, 255 NULL  ,
   ISADMIN DB_INTEGER(1) NULL  
   , PRIMARY KEY (MAIL) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : SERVICE
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS SERVICE
 (
   ID DB_INTEGER(3) NOT NULL  ,
   LIBELLE DB_TEXT, 255 NULL  ,
   DESC DB_TEXT(1000) NULL  ,
   IMAGE DB_TEXT, 255 NULL  ,
   PRIX DB_SINGLE(5,2) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : PRODUIT
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS PRODUIT
 (
   ID DB_INTEGER(3) NOT NULL  ,
   LIBELLE DB_TEXT, 255 NULL  ,
   DESC DB_TEXT(1000) NULL  ,
   IMAGE DB_TEXT, 255 NULL  ,
   PRIX DB_SINGLE(5,2) NULL  ,
   QTT DB_INTEGER(3) NULL  
   , PRIMARY KEY (ID) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : TECHNICIENS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS TECHNICIENS
 (
   IDTEC DB_INTEGER(3) NOT NULL  ,
   NOM DB_TEXT, 255 NULL  ,
   PRENOM DB_TEXT, 255 NULL  
   , PRIMARY KEY (IDTEC) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : COMMANDES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS COMMANDES
 (
   REFCOM DB_INTEGER(3) NOT NULL  ,
   MAIL DB_TEXT, 255 NOT NULL  ,
   DTECOM DB_DATE(8) NULL  ,
   DATELIVRE DB_DATE(4) NULL  ,
   ETAT DB_TEXT, 255 NULL  
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
   REFCOM DB_INTEGER(3) NOT NULL  ,
   ID DB_INTEGER(3) NOT NULL  ,
   QTT DB_INTEGER(3) NULL  ,
   REMISE DB_SINGLE(5,2) NULL  
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
   REFCOM DB_INTEGER(3) NOT NULL  ,
   ID DB_INTEGER(3) NOT NULL  
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
   IDTEC DB_INTEGER(3) NOT NULL  ,
   ID DB_INTEGER(3) NOT NULL  ,
   DATEHEUREDEB DB_DATE(12) NULL  ,
   DATEHEUREFIN DB_DATE(12) NULL  
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

