<?php
require_once "includes/functions.php";
session_start (); //restaure ou créer une session 

if (!empty($_POST['username']) and !empty($_POST['password'])){
    $email = $_POST['username'];
    $password = $_POST['password'];
    // EXPLICATION NEEDEEEEEEDDDDD !
    $stmt = getDb()->prepare('select * from user where mail_user=? and password_user=?');
    $stmt->execute(array($email, $password));
    $result = $stmt -> fetch();

    if ($result) {
      // Authentication successful
      $_SESSION['login'] = $email;
      redirect("index.php");
    }
    else {
      $error = "Utilisateur non reconnu";
    }
}
?>

<html>
test
<?php 
// A vérifier !!!!!
$pageTitle = "Connexion";
require_once "includes/header.php";
?>

<body>
<div class="container">
<div class="card col-sm-6 offset-sm-3 col-xs-12">
    <br/>
  <h3>Se connecter</h3>
  <br/>
  <form action="valide_login" method="POST">
   
        <input type="email" required
        class="form-control form__input"
        id="email" name="email" placeholder="E-mail"
        value=""
        />
    <br/><br/>
    <div class="row">
      <div class="col-sm-8 offset-sm-0">
        
          <input type="password" required
          class="form-control form__input"
          id="pwd" name="password" pattern=".{8,}"
          title="Merci d'entrer un mot de passe de 8 caractère minimum"
          value=""
          placeholder="Mot de passe"
        />
      <br/>
    </div>
    </div>
    <br/><br/>
    <input type="hidden" name="action" value="join" />
      <a href = "index.php">
      <button type="button" class="btn btn-default btn-block"> Se connecter </button>
       
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

</body>
</html>