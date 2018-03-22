<?php 
session_start();
?>

<html>

<?php 
// A vérifier !!!!!
$pageTitle = "Connexion";
require_once "includes/header.php";
?>

<body>
<div class="container">

    <br/>
    <?php
    if (isset($_SESSION['role']) && (!empty($_SESSION['role']))) {
      // pour deconnexion
      ?>
      <div class="card col-sm-6 offset-sm-3 col-xs-12">
<h3>Vous êtes déjà connecté</h3>
  <br/>
  
    <form action="logout.php" method="POST">
   
  
    <input type="hidden" name="action" value="join" />
      
      <button type="submit" class="btn btn-default btn-block"> Se déconnecter </button>
       
  </form>
  <br/><br/>
      </div>
      <?php
    }
    else{
      ?>
  <div class="card col-sm-6 offset-sm-3 col-xs-12">  
  <h3>Se connecter</h3>
  <br/>
  <form action="valide_connexion.php" method="POST">
   
        <input type="email" required
        class="form-control form__input"
        id="email" name="email" placeholder="E-mail"
        value=""
        />
    <br/><br/>
        
          <input type="password" required
          class="form-control form__input"
          id="pwd" name="password" pattern=".{8,}"
          title="Merci d'entrer un mot de passe de 8 caractère minimum"
          value=""
          placeholder="Mot de passe"
        />
      <br/>
      <br/><br/>
    <input type="hidden" name="action" value="join" />
      
      <button type="submit" class="btn btn-default btn-block"> Se connecter </button>
       
  </form>

<br/>

</div>
</div>
</div> 
<!-- nb div à vérifier -->


<!-- container fermé -->

<br/><br/><br/>
<div class="container">



<div class="card col-sm-6 offset-sm-3 col-xs-12">
  <br/>
    <h3> Pas encore inscript ? </h3>
  <br/><br/>

  <a href="inscription.php">
  <button type="button" class="btn btn-default btn-block">Créer un compte</button>
  </a>
  <br/><br/>
</div>

</div>
</div>
<?php
}
    ?>
</body>
</html>