<?php
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php";

// Recupération de la liste des actions
$query = "select * from actions order by DATE_ACT desc limit 3";
$resultat_act = $connexion->query($query);


// Recupération de la liste des articles
$query = "select * from articles order by DATE_ART desc limit 3";
$resultat_art = $connexion->query($query);
?>

<h1 align = "center" > Quel monde laisserons-nous aux générations qui viennent ?</h1>

<section class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row"><br/><br/>
                <?php
while ($obj = $resultat_act->fetch_object())
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
    while ($obj = $resultat_art->fetch_object())
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
}
?>

<?php require_once "../includes/footer.php"; ?>