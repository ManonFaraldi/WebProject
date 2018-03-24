<?php
session_start (); //restaure ou créer une session 
require_once "../includes/functions.php";
//echo $_POST['email']."    ".$_POST['password'];
if (isset($_SESSION['email']) && isset($_SESSION['role']))  {

    redirect("index.php");
}

if (isset($_POST['email']) && isset($_POST['password'])){
$user = getUser($_POST['email'],$_POST['password'],$connexion);
//var_dump($user);
if (isset($user) && !($user == null)){
  $_SESSION['email']=$user->MAIL_USER;
  $_SESSION['role']=$user->LABEL_ROLE_USER;
  $_SESSION['nom']=$user->NOM_USER;
  $_SESSION['user'] = $user;
  redirect("index.php");
}
else {
    redirect("connexion.php");

}

}

?>