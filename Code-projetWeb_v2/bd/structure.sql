drop table if exists _USER;
drop table if exists COMITES;
drop table if exists ACTIONS;
drop table if exists ARTICLES;
drop table if exists COMMENTAIRES;

# -----------------------------------------------------------------------------
#       TABLE : _USER
# -----------------------------------------------------------------------------

CREATE TABLE _USER(
    USR_ID INTEGER NOT NULL PRIMARY KEY AUTO_INCREMENT,
    USR_LOGIN VARCHAR(50)NOT NULL,
    USR_PASSWORD VARCHAR(88) NOT NULL
) engine=innodb character set utf8 collate utf8_unicode_ci
COMMENT = "";

# -----------------------------------------------------------------------------
#       TABLE : COMITES
# -----------------------------------------------------------------------------
CREATE TABLE IF NOT EXISTS COMITES
 (
   NOM_COM VARCHAR(20),
   PRESENTATION_COM TEXT NOT NULL  ,
   CONTACT_COM VARCHAR(20) NOT NULL , 
   LIEU_COM VARCHAR (10) NOT NULL ,
    
    PRIMARY KEY (NOM_COM) 
 ) 
 comment = "";

# -----------------------------------------------------------------------------
#       TABLE : ACTIONS
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ACTIONS
 (
   LIB_ACT INTEGER(3) NOT NULL auto_increment ,
   TITRE_ACT VARCHAR(20) NOT NULL  ,
   LIEU_ACT VARCHAR(20) NOT NULL  ,
   DATE_ACT DATE NOT NULL  ,
   SUJET_ACT TEXT NOT NULL ,
   PRIMARY KEY (LIB_ACT) 
 ) 
 comment = "";


# -----------------------------------------------------------------------------
#       TABLE : ARTICLES
# -----------------------------------------------------------------------------

CREATE TABLE IF NOT EXISTS ARTICLES
 (
   LIB_ART  INTEGER(3) NOT NULL auto_increment ,
   NOM_ART VARCHAR(20) NOT NULL  ,
   TITRE_ART VARCHAR(50) NOT NULL ,
   CONTENU_ART TEXT NOT NULL ,
   DATE_ART DATE NOT NULL,
    PRIMARY KEY (LIB_ART) 
 )engine=innodb character set utf8 collate utf8_unicode_ci
 comment = "";


# -----------------------------------------------------------------------------
#       TABLE : COMMENTAIRES
# -----------------------------------------------------------------------------

 CREATE TABLE IF NOT EXISTS COMMENTAIRES
 (
   LIB_COMM INTEGER(5) NOT NULL auto_increment ,
   USR_ID INTEGER NOT NULL  ,
   LIB_ART INTEGER NOT NULL,
   DATE_COMM DATE NOT NULL  ,
   TEXT_COMM TEXT NOT NULL ,
   CONSTRAINT FK_USR_ID FOREIGN KEY (USR_ID) REFERENCES _USER(USR_ID),
   CONSTRAINT FK_LIB_ART FOREIGN KEY (LIB_ART) REFERENCES ARTICLES(LIB_ART),
   PRIMARY KEY (LIB_COMM) 
 ) 
 comment = "";
