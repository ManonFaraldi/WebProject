<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";

// Recupération de la liste des articles
$query = "select * from articles order by DATE_ART desc";
$resultat = $connexion->query($query);
?>

<div class="container">
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<div class="card col-sm-9 offset-sm-3 col-xs-12">

<?php
echo '<a href="articlestest.php?titre='.$obj->ID_ART.'">';
printf ("%s (%s) %s", $obj->TITRE_ART, $obj->AUTEUR_ART,$obj->DATE_ART);
?>
</a>
<br/>
</div>
<br/>
<?php
}
?>
  <br/>
  <br/>
  <?php 
  // ne'afficher le bouton que si l'utilisateur est autorisé à ecrire un article 
  if (isset($_SESSION['role'])) {
  if ( $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
  {
?>

<a href="nouvel_article.php">
  <button type="button" class="btn btn-default btn-block">Ajouter un article</button>
  </a>
  <?php
  }
}
  ?>
  <br/>
  <br/>
</div>


<?php require_once "../includes/footer.php"; ?>