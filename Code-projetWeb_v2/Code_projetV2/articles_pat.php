<?php

session_start();

require_once "includes/functions.php"; 
require_once "includes/header.php";

// Recupération de la liste des articles
$query = "select * from articles order by DATE_ART desc";
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
                        <div class="card">
                          <?php echo '<a class="img-card" href="articlestest.php?titre='.$obj->ID_ART.'" class="btn btn-link btn-block">';?>
                            <?php echo '<img src= '.$obj->IMG_ART.' />' ; ?> 
                          </a>
                            <div class="card-content">
                                <h4 class="card-title">
                                  <?php echo '<a href="articles_lire.php?titre='.$obj->ID_ART.'">';?><?php printf($obj->TITRE_ART);?></a>
                                </h4>
                                <p class="">
                                  <?php printf($obj->RESUME_ART);?>
                                </p>
                            </div>
                            <div class="card-read-more">
                            <?php echo '<a href="articlestest.php?titre='.$obj->ID_ART.'" class="btn btn-link btn-block">';?>
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
// ne'afficher le bouton que si l'utilisateur est autorisé à ecrire un article 
if (isset($_SESSION['role'])) {
if ( $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
{
?>
<div class="container">
    <a href="nouvel_article.php">
        <button type="button" class="btn btn-default btn-block">
        <?php if ( $_SESSION['role'] == "MEMBRE")
        {
        ?>
            Proposer un article

        <?php
        }
        else 
        {
        ?>Ajouter un article<?php } ?></button>
    </a>

</div>
<?php
  }
}
?>
<?php require_once "includes/footer.php"; ?>


