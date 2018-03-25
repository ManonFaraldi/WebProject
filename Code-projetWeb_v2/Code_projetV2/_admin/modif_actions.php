<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}
if (isset($_POST['visible'])) $visible = 1;
    else $visible = 0;
if (isset($_POST['valide'])) $valide = 1;
    else $valide = 0;




        $query = "update actions set TITRE_ACT = '".escape($_POST['titre'])."',LIEU_ACT = '".escape($_POST['lieu'])."',SUJET_ACT = '".escape($_POST['sujet'])."',VISIBLE_ACT = ".$visible.",VALIDE_CRT = ".$valide." where ID_ACT = ".$_POST['id'].";";
        echo $query;
        $resultat = $connexion->query($query);



redirect("gestion_actions.php");
?>