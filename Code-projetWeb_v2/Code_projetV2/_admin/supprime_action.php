<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}

$id=$_GET['id'];
if ($id > 0)
    {
        $query = "delete from actions where ID_ACT = $id";
        $resultat = $connexion->query($query);
    }


redirect("gestion_actions.php");
?>