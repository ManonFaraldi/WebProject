<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
 
// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
echo "Vous n'êtes pas autorisé à accéder à cette page";
redirect("presentation.php");
}


// Recupération de la liste des articles
$query = "select * from user order by NOM_USER asc";
$resultat = $connexion->query($query);
?>

<div class="container">
<table class="table">
  <thead class="thead">
    <th>Nom</th> 
    <th>Prénom</th> 
    <th>Mail</th>
    <th>Role</th>
    <th>Code Postal</th>
    <th>Actif</th>
    <th></th>
    <th></th>
  </thead>
  <tbody>
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<tr>

<?php
echo("<td>".$obj->NOM_USER."</td>");
echo "<td>".$obj->PRENOM_USER."</td>";
echo "<td>".$obj->MAIL_USER."</td>";
echo "<td>".$obj->LABEL_ROLE_USER."</td>";
echo "<td>".$obj->ZIPCODE_USER."</td>";
echo "<td>".$obj->ACTIF_USER."</td>";
echo "<td><a href='edit_utilisateur.php?id=".$obj->ID_USER."'><image src='/images/edit.png'></href></td>";
echo "<td><a href='supprime_utilisateur.php?id=".$obj->ID_USER."'><image src='/images/delete.png'></href></td>";
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