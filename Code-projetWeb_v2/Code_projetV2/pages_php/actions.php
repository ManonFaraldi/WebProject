<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";

// Recupération de la liste des actions
$query = "select * from actions order by DATE_ACT desc";
$resultat = $connexion->query($query);
?>
<section class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                <?php
while ($obj = $resultat->fetch_object())
{
?>
                    <div class="col-xs-12 col-sm-4">
                        <div class="card-jaune">
                          <?php echo '<a class="img-card" href="actiontest.php?titre='.$obj->ID_ACT.'" class="btn btn-link btn-block">';?>
                            <?php echo '<img src= '.$obj->IMG_ACT.' />' ; ?> 
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                  <?php echo '<a href="action_lire.php?titre='.$obj->ID_ACT.'">';?><?php printf($obj->TITRE_ACT);?></a>
                                </h4>
                                <p class="">
                                  <?php printf($obj->SUJET_ACT);?>
                                </p>
                            </div>
                            <div class="card-read-more">
                            <?php echo '<a href="actionstest.php?titre='.$obj->ID_ACT.'" class="btn btn-link btn-block">';?>
                                    En savoir plus
                                </a>
                            </div>
                        </div>
                    </div>
<?php
}
?>

                </div>
            </div>
        </div>
    </div>
</section>
<?php
// ne'afficher le bouton que si l'utilisateur est autorisé à ecrire une action
if (isset($_SESSION['role'])) {
if ( $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
{
?>
<div class="container">
    <a href="nouvelle_action.php">
        <button type="button" class="btn btn-default btn-block">
        <?php if ( $_SESSION['role'] == "MEMBRE")
        {
        ?>
            Proposer une action

        <?php
        }
        else 
        {
        ?> Ajouter une action <?php } ?></button>
    </a>

</div>
<?php
  }
}
?>
<?php require_once "../includes/footer.php"; ?>


