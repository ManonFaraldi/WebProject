<?php
session_start();
require_once "../includes/functions.php";
//session_start();
echo $_POST["user_commentaire"]."<br/>";
echo $_POST["date_commentaire"]."<br/>";
echo $_POST["id_article"]."<br/>";
echo $_POST["contenu"]."<br/>";
$today = date("Y-m-d");
//echo $today;

$sql = "insert into commentaires (ID_USER,ID_ART,DATE_COMM,TEXT_COMM) values ('".$_POST["user_commentaire"]."','".$_POST["id_article"]."','".$_POST["date_commentaire"]."','" .$_POST["contenu"]."')";
    $resultat = $connexion->query($sql);
    echo $sql;
    redirect('articlestest.php?titre='.$_POST["id_article"]);


?>