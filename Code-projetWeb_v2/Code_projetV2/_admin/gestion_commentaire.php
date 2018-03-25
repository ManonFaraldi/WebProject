<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("../presentation.php");
}


// Recupération de la liste des commentaires
$query = "select * from commentaires order by ID_USER desc";
$resultat = $connexion->query($query);
?>

<div class="container">
<table class="table">
  <thead class="thead">
    <th>Utilisateur</th> 
    <th>Article</th> 
    <th>Date</th> 
    <th>Valide</th>
    <th>Visible</th>
    <th>Supprimer</th>
    
  </thead>
  <tbody>
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<tr>

<?php
echo("<td>".$obj->ID_USER."</td>");
echo "<td>".$obj->ID_ART."</td>";
echo "<td>".$obj->DATE_ACT."</td>";
echo "<td>".$obj->VALIDE_ACT."</td>";
echo "<td>".$obj->VISIBLE_ACT."</td>";
echo "<td><a href='supprime_commentaire.php?id=".$obj->ID_COMM."'><image src='../images/delete.png'></href></td>";
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