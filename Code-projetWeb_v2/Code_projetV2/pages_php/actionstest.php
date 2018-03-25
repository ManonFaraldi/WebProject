<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";

// Recupération de la liste des actions
$query = "select * from actions where ID_ACT='".$_GET["titre"]."'";
$resultat = $connexion->query($query);
?>

<div class="container">
  
<?php
while ($obj = $resultat->fetch_object())
{
?>
<div class="card-jaune col-sm-9 offset-sm-3 col-xs-12">

<?php
printf("<h3 class='titre'>%s</h3>" , $obj->TITRE_ACT);
echo '<img src= '.$obj->IMG_ACT.' />' ;
printf ("<h4 class=date>(%s)</h4><h5 class = date>%s</h5>", $obj->LIEU_ACT,$obj->DATE_ACT);
printf("%s", $obj->SUJET_ACT);
?>
</a>
<br/><br/>
</div>
<br/>
<?php
}
?>

  <br/>
  <br/>
</div>


<?php require_once "../includes/footer.php"; ?>