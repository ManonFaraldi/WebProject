<?php
session_start();
require_once "../includes/functions.php"; 

 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}
if (isset($_POST['visible'])) $visible = 1;
    else $visible = 0;
if (isset($_POST['valide'])) $valide = 1;
    else $valide = 0;




        $query = "update articles set TITRE_ART = '".escape($_POST['titre'])."',RESUME_ART = '".escape($_POST['resume'])."',CONTENU_ART = '".escape($_POST['contenu'])."',AUTEUR_ART = '".escape($_POST['auteur'])."',VISIBLE_ART = ".$visible.",VALIDE_ART = ".$valide." where ID_ART = ".$_POST['id'].";";
        echo $query;
        $resultat = $connexion->query($query);



redirect("gestion_articles.php");
?>