<?php 
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php"; 
$article = getArticleById($_GET['id'],$connexion);

// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
    echo "Vous n'êtes pas autorisé à accéder à cette page";
    redirect("presentation.php");
    }
?>

<div class="container">

<div class="card col-sm-8 offset-sm-3 col-xs-12">
    <br/>
  <h3>Modification article</h3>
  <br/>
  <form action="modif_article.php" method="POST">
   
        <input type="text" required
        class="form-control form__input"
        id="titre" name="titre" placeholder="Titre"
        value="<?php echo $article->TITRE_ART; ?>"
        />
    <br/><br/> 

    <input type="text" required
        class="form-control form__input"
        id="auteur" name="auteur" placeholder="Auteur"
        value="<?php echo $article->AUTEUR_ART; ?>"
        />
    <br/><br/> 

    <textarea required rows="4"
        class="form-control form__input"
        id="resume" name="resume" placeholder="Résumé" value="">
        <?php echo $article->RESUME_ART; ?>
        </textarea>
    <br/><br/> 

    <textarea required rows="10"
        class="form-control form__input"
        id="contenu" name="contenu" placeholder="Contenu" value="">
        <?php echo $article->CONTENU_ART; ?>
        </textarea>

        <div class="row">

            <div class="col-sm-2 offset-sm-0">Visible</div>

            <div class="col-sm-2 offset-sm-0">
          <input type="checkbox" class="form-control form__input"
          id="visible" name="visible" <?php if ($article->VISIBLE_ART == 1) echo "checked "; ?>
          value="<?php echo $article->VISIBLE_ART; ?>"
          />
          </div>

      <div class="col-sm-2 offset-sm-0">Valide</div>
          <div class="col-sm-2 offset-sm-0">
           <input type="checkbox" class="form-control form__input"
          id="valide" name="valide" <?php if ($article->VALIDE_ART == 1) echo "checked "; ?>
          value="<?php echo $article->VALIDE_ART; ?>"
          />
          
      </div>
    </div>
    
    
    <br/><br/>
    <input type="hidden" name="id" id="id"  value="<?php echo $article->ID_ART; ?>" />

	<button type="submit" class="btn btn-default btn-block">Valider</button>
    <a href="gestion_articles.php">
  <button type="button" class="btn btn-default btn-block">Annuler</button>
  </a>

       
  </form>

  <br/><br/>
</div>



</div>


</body>
</html>