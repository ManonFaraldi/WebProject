<?php
session_start();
require_once "../includes/functions.php"; 

 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}

$id=$_GET['id'];
if ($id > 0)
    {
        $query = "delete from user where ID_USER = $id";
        //echo $query;
        $resultat = $connexion->query($query);
    }


redirect("gestion_utilisateurs.php");
?>