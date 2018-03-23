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