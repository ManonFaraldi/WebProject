<?php 
require_once "../includes/functions.php"; 
require_once "../includes/header.php";


if (empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['zipcode']) || empty($_POST['firstname']) || empty($_POST['lastname'])) //Oublie d'un champ

{

    $message = '<p>Veuillez renseigner tous les champs</p>';

}
else
{
    
    $query = "Select mail_user from user where mail_user = '".$_POST['email']."';";
    $resultat = $connexion->query($query);
    $nb_email = $resultat->num_rows;

    if ($nb_email > 0)
    {
        $message = '<p>Cette adresse mail est déjà utilisée pour un autre compte</p>';
        redirect("inscription.php");
    }
    else
    {
        $sql = "insert into user (NOM_USER,PRENOM_USER,PASSWORD_USER,MAIL_USER,ZIPCODE_USER) values ('".$_POST['firstname']."','". $_POST['lastname']."','" .$_POST['pwd']."','". $_POST['email']."','". $_POST['zipcode']."')";
        $resultat = $connexion->query($sql);
        redirect("login.php");
    }

    
}

?>