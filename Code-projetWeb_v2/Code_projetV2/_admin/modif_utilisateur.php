<?php
session_start();
require_once "../includes/functions.php"; 

 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}
echo $_POST['role'];
if (isset($_POST['actif'])) $actif = 1;
    else $actif = 0;
echo $actif;



        $query = "update user set NOM_USER = '".escape($_POST['firstname'])."',PRENOM_USER = '".escape($_POST['lastname'])."',MAIL_USER = '".escape($_POST['email'])."',LABEL_ROLE_USER = '".$_POST['role']."',ZIPCODE_USER = ".$_POST['zipcode'].",ACTIF_USER = ".$actif." where ID_USER = ".$_POST['id'].";";
        echo $query;
        $resultat = $connexion->query($query);



redirect("gestion_utilisateurs.php");
?>