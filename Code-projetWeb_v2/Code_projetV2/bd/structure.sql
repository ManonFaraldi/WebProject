drop table if exists _USER;
drop table if exists COMITES;
drop table if exists ACTIONS;
drop table if exists ARTICLES;
drop table if exists COMMENTAIRES;

# -----------------------------------------------------------------------------
#       TABLE : USER
# -----------------------------------------------------------------------------

CREATE TABLE USER(
    ID_USER INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    NOM_USER VARCHAR(25)NOT NULL,
    PRENOM_USER VARCHAR(20)NOT NULL,
    PASSWORD_USER VARCHAR(20) NOT NULL,
    MAIL_USER VARCHAR(30)NOT NULL,
    ZIPCODE_USER INTEGER(5) NOT NULL,
    LABEL_ROLE_USER VARCHAR(30)NOT NULL DEFAULT "INSCRIT"
) engine=innodb character set utf8 collate utf8_unicode_ci
COMMENT = "";

# -----------------------------------------------------------------------------
#       TABLE : COMITES
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS COMITES
 (
   ID_COM INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
   NOM_COM VARCHAR(20),
   PRESENTATION_COM TEXT NOT NULL  ,
   CONTACT_COM VARCHAR(20) NOT NULL , 
   LIEU_COM VARCHAR (10) NOT NULL 
    
 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ACTIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTIONS
 (
   ID_ACT INTEGER(3) NOT NULL auto_increment ,
   TITRE_ACT VARCHAR(20) NOT NULL  ,
   LIEU_ACT VARCHAR(20) NOT NULL  ,
   DATE_ACT DATE NOT NULL  ,
   SUJET_ACT TEXT NOT NULL ,
   PRIMARY KEY (ID_ACT) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       TABLE : ARTICLES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ARTICLES
 (
   ID_ART  INTEGER(3) NOT NULL auto_increment ,
   AUTEUR_ART VARCHAR(25),
   TITRE_ART VARCHAR(100) NOT NULL ,
   CONTENU_ART TEXT NOT NULL ,
   RESUME_ART VARCHAR(250) NOT NULL,
   DATE_ART DATE NOT NULL,
    PRIMARY KEY (ID_ART) 
 )engine=innodb character set utf8 collate utf8_unicode_ci
 comment = "";


# -----------------------------------------------------------------------------
#       TABLE : COMMENTAIRES
# -----------------------------------------------------------------------------

 CREATE TABLE IF NOT EXISTS COMMENTAIRES
 (
   ID_COMM INTEGER(5) NOT NULL auto_increment ,
   ID_USER INTEGER NOT NULL  ,
   ID_ART INTEGER NOT NULL,
   DATE_COMM DATE NOT NULL  ,
   TEXT_COMM TEXT NOT NULL ,
   CONSTRAINT FK_ID_USER FOREIGN KEY (ID_USER) REFERENCES USER(ID_USER),
   CONSTRAINT FK_ID_ART FOREIGN KEY (ID_ART) REFERENCES ARTICLES(ID_ART),
   PRIMARY KEY (ID_COMM) 
 ) 
 comment = "";
