<?php
require_once "includes/functions.php";
session_start();

if (isUserConnected()) {
    
    if (isset($_POST['nom'])) {
        // the article form has been posted : retrieve article parameters
        $NOM_ART = escape($_POST['nom']);
        $TITRE_ART = escape($_POST['titre']);
        $CONTENU_ART = escape($_POST['contenu']);
        $DATE_ART = 'date'($_POST[date('l jS \of F Y h:i:s A')]);
        
        $tmpFile = $_FILES['image']['tmp_name'];
        if (is_uploaded_file($tmpFile)) {
            // upload article image
            $image = basename($_FILES['image']['name']);
            $uploadedFile = "images/$image";
            move_uploaded_file($_FILES['image']['tmp_name'], $uploadedFile);
        }
        
        // insert article into BD
        $stmt = getDb()->prepare('insert into article
        (NOM_ART, TITRE_ART, contenu , DATE_ART)
        values (?, ?, ?, ?)');
        $stmt->execute(array($NOM_ART, $TITRE_ART, $CONTENU_ART, $DATE_ART, $image));
        redirect("index.php");
    }
    ?>

  <!doctype html>
  <html>

  <?php
    $pageTitle = "Ajout d'un article";
    require_once "includes/head.php";
    ?>

    <body>
      <div class="container">
        <?php require_once "includes/header.php"; ?>

          <h2 class="text-center">Ajout d'un article </h2>
          <div class="well">
            <form class="form-horizontal" role="form" enctype="multipart/form-data" action="article_add.php" method="post">
              <input type="hidden" name="id" value="<?= $LIB_ART ?>">
              <div class="form-group">
                <label class="col-sm-4 control-label">Titre</label>
                <div class="col-sm-6">
                  <input type="text" name="title" value="<?= $TITRE_ART ?>" class="form-control" placeholder="Entrez le titre de l'article" required autofocus>
                </div>
              </div>
              <div class="form-group">
                <label class="col-sm-4 control-label">Contenu</label>
                <div class="col-sm-6">
                  <textarea name="contenu" class="form-control" placeholder="Rédiger votre article" required>
                    <?= $CONTENU_ART ?>
                  </textarea>
                </div>
              </div>
             
               <div class="form-group">
                <label class="col-sm-4 control-label">Image</label>
                <div class="col-sm-4">
                  <input type="file" name="image" />
                </div>
              </div>
              <div class="form-group">
                <div class="col-sm-4 col-sm-offset-4">
                  <button type="submit" class="btn btn-default btn-primary"><span class="glyphicon glyphicon-save"></span> Enregistrer</button>
                </div>
              </div>
            </form>
          </div>

          <?php require_once "includes/footer.php"; ?>
      </div>

      <?php require_once "includes/scripts.php"; ?>
    </body>

  </html>

  <?php } else { ?>
    <html>

    <body>
      <img src="https://vignette.wikia.nocookie.net/prettylittleliars/images/7/72/Resized_jesus-says-meme-generator-awww-how-cute-nice-try-though-a97f93.jpg/revision/latest?cb=20141201013642" />
    </body>

    </html>
    <?php } ?>