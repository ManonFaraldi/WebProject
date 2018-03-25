<?php
    $host = "localhost";
    $username = "root";
    $password = "";
    $db = "jgg_site";

$connexion = mysqli_connect($host,$username,$password,$db) or die("Connexion impossible, a zut! ");
$_SESSION['connexion'] = $connexion;


function getUser($email,$password,$connexion){
    $obj = null;
    $query = "select * from user where MAIL_USER = '".$email."' AND PASSWORD_USER = '".$password."' AND ACTIF_USER = true;";
    $resultat = $connexion->query($query);
    if($resultat) $obj = $resultat->fetch_object();
    $_SESSION['ID_USER'] = $obj->ID_USER;
    return $obj;

}

function getUserById($id,$connexion){
    $obj = null;
    $query = "select * from user where ID_USER = $id";
    $resultat = $connexion->query($query);
    if($resultat) $obj = $resultat->fetch_object();
    return $obj;

}

function getArticleById($id,$connexion){
    $obj = null;
    $query = "select * from articles where ID_ART = $id";
    $resultat = $connexion->query($query);
    if($resultat) $obj = $resultat->fetch_object();
    return $obj;

}

function getActionsById($id,$connexion){
    $obj = null;
    $query = "select * from actions where ID_ACT = $id";
    $resultat = $connexion->query($query);
    if($resultat) $obj = $resultat->fetch_object();
    return $obj;

}


// Check if a user is connected
function isUserConnected() {
    return isset($_SESSION['login']);
}

// Redirect to a URL
function redirect($url) {
    header("Location: $url");
}

// Escape a value to prevent XSS attacks
function escape($value) {
    return htmlspecialchars($value, ENT_QUOTES, 'UTF-8', false);
}