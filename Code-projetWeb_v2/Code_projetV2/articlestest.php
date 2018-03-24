<?php
session_start();
require_once "includes/functions.php"; 
require_once "includes/header.php";

// Recupération de la liste des articles
$query = "select * from articles where ID_ART='".$_GET["titre"]."'";
$resultat = $connexion->query($query);
?>

<div class="container">
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<div class="card-blue col-sm-9 offset-sm-3 col-xs-12">
<?php 
//echo '<img src= '.$obj->IMG_ART.' />' ; ?> 
<?php
printf("<h3 class='titre'>%s</h3>" , $obj->TITRE_ART);
echo '<img src= '.$obj->IMG_ART.' />' ;
printf ("<h4 class=date>(%s)</h4><h5 class = date>%s</h5>", $obj->AUTEUR_ART,$obj->DATE_ART);
printf("%s", $obj->CONTENU_ART);
?>
</a>
<br/><br/>
</div>
<br/>
<?php
}
?>
<?php
  // Recupération de la liste des articles
$query = "select * from commentaires where ID_ART='".$_GET["titre"]."'";
$resultat_commentaire = $connexion->query($query);
?>

<div class="container">
  
<?php
while ($obj = $resultat_commentaire->fetch_object())
{
?>
<div class="card_commentaire col-sm-9 offset-sm-3 col-xs-12">
<?php
//printf ("%s (%s) %s", $obj->TITRE_ART, $obj->AUTEUR_ART,$obj->DATE_ART);
$query = "select prenom_user from user where ID_USER= $obj->ID_USER"."select nom_user from user where ID_USER= $obj->ID_USER";
$auteur = $connexion->query($query);

printf("<h4 class=auteur>$auteur</h4><h5 class=date>$obj->DATE_COMM</h5>");
printf("%s", $obj->TEXT_COMM);
?>
</a>
<br/>
</div>
<br/>
<?php
}
?>
  <?php 
  // ne'afficher le bouton que si l'utilisateur est autorisé à ecrire un article 
  if (isset($_SESSION['role'])) {
  if ( $_SESSION['role'] == "INSCRIT" || $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
  {
?>

<?php echo '<a href="nouveau_commentaire.php?titre='.$_GET["titre"].'">'; ?>
  <button type="button" class="btn btn-default btn-block">Commenter</button>
  </a>
  <?php
  }
}
  ?>
  <br/>
  <br/>
</div>


<?php require_once "includes/footer.php"; ?>