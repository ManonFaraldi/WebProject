<?php
session_start();
require_once "includes/functions.php";
//session_start();
echo $_POST["titre"]."<br/>";
echo $_POST["resume"]."<br/>";
echo $_POST["contenu"]."<br/>";
$today = date("Y-m-d");
//echo $today;

$sql = "insert into articles (AUTEUR_ART,CONTENU_ART,DATE_ART,RESUME_ART,TITRE_ART) values ('".$_SESSION['user']->NOM_USER."','".$_POST['contenu']."','".$today."','". $_POST['resume']."','" .$_POST['titre']."')";
    $resultat = $connexion->query($sql);
    //echo $sql;
    redirect("articles.php");


?>