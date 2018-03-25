<?php 
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php"; 
$article = getActionById($_GET['id'],$connexion);

// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
    echo "Vous n'êtes pas autorisé à accéder à cette page";
    redirect("presentation.php");
    }
?>

<div class="container">

<div class="card col-sm-8 offset-sm-3 col-xs-12">
    <br/>
  <h3>Modification action</h3>
  <br/>
  <form action="modif_action.php" method="POST">
   
        <input type="text" required
        class="form-control form__input"
        id="titre" name="titre" placeholder="Modifier le titre"
        value="<?php echo $action->TITRE_ACT; ?>"
        />
    <br/><br/> 

    <<input type="text" required
        class="form-control form__input"
        id="lieu" name="lieu" placeholder="Changer le lieu de l'action"
        value="<?php echo $action->LIEU_ACT; ?>"
    />
    <br/>
    <textarea required rows="10"
        class="form-control form__input"
        id="sujet" name="sujet" placeholder="Modifier le sujet ou le détailler " 
        value="<?php echo $action->SUJET_ACT; ?>">
        </textarea>

        <div class="row">

            <div class="col-sm-2 offset-sm-0">Visible</div>

            <div class="col-sm-2 offset-sm-0">
          <input type="checkbox" class="form-control form__input"
          id="visible" name="visible" <?php if ($action->VISIBLE_ACT == 1) echo "checked "; ?>
          value="<?php echo $action->VISIBLE_ACT; ?>"
          />
          </div>

      <div class="col-sm-2 offset-sm-0">Valide</div>
          <div class="col-sm-2 offset-sm-0">
           <input type="checkbox" class="form-control form__input"
          id="valide" name="valide" <?php if ($action->VALIDE_ACT == 1) echo "checked "; ?>
          value="<?php echo $action->VALIDE_ACT; ?>"
          />
          
      </div>
    </div>
    
    
    <br/><br/>
    <input type="hidden" name="id" id="id"  value="<?php echo $action->ID_ACT; ?>" />

	<button type="submit" class="btn btn-default btn-block">Valider
        <a href="gestion_actions.php"> </a>
        <a class="glyphicon glyphicon-ok"></a><br/></button>
  <button type="button" class="btn btn-default btn-block">Annuler</button>
  </a>

       
  </form>

  <br/><br/>
</div>



</div>


</body>
</html>