<?php 
session_start();
require_once "../includes/functions.php"; 
require_once "../includes/header.php"; 
$user = getUserById($_GET['id'],$connexion);

// accessible seulement si l'utilisateur est autorisé 
if ((!isset($_SESSION['role'])) || !($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")) {
    echo "Vous n'êtes pas autorisé à accéder à cette page";
    redirect("presentation.php");
    }
?>

<div class="container">



<div class="card col-sm-6 offset-sm-3 col-xs-12">
    <br/>
  <h3>Infos utilisateur</h3>
  <br/>
  <form action="modif_utilisateur.php" method="POST">

  <div class="row u-margin-bottom-little">
      <div class="col-sm-6 offset-sm-0">
        
          <input type="text" required
            class="form-control form__input" id="firstname" name="firstname"
            value="<?php echo $user->PRENOM_USER; ?>"
            placeholder="Prénom"
          />
          
      </div>

      <div class="col-sm-6 offset-sm-0">
        
          <input type="text" class="form-control form__input"
            required id="lastname" name="lastname" value="<?php echo $user->NOM_USER; ?>"
            placeholder="Nom"
          />
         
      </div>
    </div>
   
    <br/><br/>
    
    <div class="row">
        <div class="col-sm-8 offset-sm-0">
        
            <input type="email" required
            class="form-control form__input"
            id="email" name="email" placeholder="E-mail"
            value="<?php echo $user->MAIL_USER; ?>"
            />
          
        </div>

      <div class="col-sm-4 offset-sm-0">
        
          <input type="zipcode" class="form-control form__input"
          required id="zipcode" name="zipcode" placeholder="code postal"
          value="<?php echo $user->ZIPCODE_USER; ?>"
          />
          
      </div>
    </div>
      
    <br/><br/>

    <div class="row">
        <div class="col-sm-8 offset-sm-0">
        
        <select id="role" name="role">
        <option value="INSCRIT" <?php if ($user->LABEL_ROLE_USER == 'INSCRIT') echo "selected "; ?>>Inscrit</option>
        <option value="MEMBRE" <?php if ($user->LABEL_ROLE_USER == 'MEMBRE') echo "selected "; ?>>Membre</option>
        <option value="MOD" <?php if ($user->LABEL_ROLE_USER == 'MOD') echo "selected "; ?>>Moderateur</option>
        <option value="ADMIN" <?php if ($user->LABEL_ROLE_USER == 'ADMIN') echo "selected "; ?>>Administrateur</option>
        </select> 
          
        </div>

      <div class="col-sm-4 offset-sm-0">
        
          <input type="checkbox" class="form-control form__input"
          id="actif" name="actif" <?php if ($user->ACTIF_USER == 1) echo "checked "; ?>
          value="<?php echo $user->ACTIF_USER; ?>"
          />
          
      </div>
    </div>
      
    <br/><br/>

    <input type="hidden" name="id" id="id"  value="<?php echo $user->ID_USER; ?>" />

	<button type="submit" class="btn btn-default btn-block">Valider</button>
    <a href="gestion_utilisateurs.php.php">
  <button type="button" class="btn btn-default btn-block">Annuler</button>
  </a>
       
  </form>



</div>

</div>


</body>
</html>