<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("../presentation.php");
}


// Recupération de la liste des actions
$query = "select * from actions order by DATE_ACT desc";
$resultat = $connexion->query($query);
?>
<h1 align="center"> Gestion des actions </h1><br/>
<div class="container">
<table class="table">
  <thead class="thead">
    <th>Titre</th> 
    <th>Lieu</th> 
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
echo("<td>".$obj->TITRE_ACT."</td>");
echo "<td>".$obj->LIEU_ACT."</td>";
echo "<td>".$obj->DATE_ACT."</td>";
echo "<td>".$obj->VALIDE_ACT."</td>";
echo "<td>".$obj->VISIBLE_ACT."</td>";
echo "<td><a href='edit_action.php?id=".$obj->ID_ACT."'><image src='../images/edit.png'></href></td>";
echo "<td><a href='supprime_action.php?id=".$obj->ID_ACT."'><image src='../images/delete.png'></href></td>";
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