<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("../presentation.php");
}


// Recupération de la liste des articles
$query = "select * from articles order by DATE_ART desc";
$resultat = $connexion->query($query);
?>
<h1 align="center"> Gestion des articles </h1><br/>
<div class="container">
<table class="table">
  <thead class="thead">
    <th>Titre</th> 
    <th>Auteur</th> 
    <th>Date</th> 
    <th>Valide</th>
    <th>Visible</th>
    <th>Modifier</th>
    <th>Supprimer</th>
  </thead>
  <tbody>
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<tr>

<?php
echo("<td>".$obj->TITRE_ART."</td>");
echo "<td>".$obj->AUTEUR_ART."</td>";
echo "<td>".$obj->DATE_ART."</td>";
echo "<td>".$obj->VALIDE_ART."</td>";
echo "<td>".$obj->VISIBLE_ART."</td>";
echo "<td><a href='edit_article.php?id=".$obj->ID_ART."'><image src='../images/edit.png'></href></td>";
echo "<td><a href='supprime_article.php?id=".$obj->ID_ART."'><image src='../images/delete.png'></href></td>";
?>
</tr>
  
<?php
}
?>
  </tbody>
</table>
  <br/>
  <br/>
 

  <br/>
</div>


<?php require_once "../includes/footer.php"; ?>