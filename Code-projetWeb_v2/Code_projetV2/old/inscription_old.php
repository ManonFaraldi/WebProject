
<?php 
require_once "../includes/functions.php"; 
require_once "../includes/header.php";
?>

<div class="container">
<div class="card col-sm-6 offset-sm-3 col-xs-12">
    <br/>
  <h3>S'inscrire</h3>
  <br/>
  <?php

if (!isset($_POST['pseudo'])) //On est dans la page de formulaire

{

    echo '<form action="enregistre_inscription.php" method="POST">
   
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
          title="Merci d\'entrer un mot de passe de 8 caractère minimum"
          value=""
          placeholder="Mot de passe"
          />
          
      </div>

      <div class="col-sm-4 offset-sm-0">
        
          <input type="zipcode" class="form-control form__input"
          required id="pwd" name="zipcode" placeholder="code postal"
          value=""
          />
          
      </div>
    </div>
    <br/><br/>
    <div class="row u-margin-bottom-little">
      <div class="col-sm-6 offset-sm-0">
        
          <input type="text" required
            class="form-control form__input" id="firstname" name="firstname"
            value=""
            placeholder="Prénom"
          />
          
      </div>

      <div class="col-sm-6 offset-sm-0">
        
          <input type="text" class="form-control form__input"
            required id="lastname" name="lastname" value=""
            placeholder="Nom"
          />
         
      </div>
    </div>
    <br/><br/>
    <input type="hidden" name="action" value="join" />
        <a href="inscription.php">
       <button type="button" class="btn btn-default btn-block">S\'inscrire</button>
       </a>
  </form>' ;
  }

  else

{

    $message='';

    if (empty($_POST['email']) || empty($_POST['pwd']) || empty($_POST['zipcode']) || empty($_POST['firstname']) || empty($_POST['lastname'])) //Oublie d'un champ

    {

        $message = '<p>Veuillez remplir tous les champs</p>

    // <p>Cliquez <a href="connexion.php">ici</a> pour revenir</p>';

    }

    else //On check si le mail est déjà dans la base de donnée

    {
        $email = $_POST['email'];
        $pwd = $_POST['pwd'];
        $zipcode = $_POST['zipcode'];
        $firstname = $_POST['firstname'];
        $lastname = $_POST['lastname'];

        

        $stmt = getDb()->prepare('select mail_user from user where mail_user=?');
        $stmt->execute($email);
        $result = $stmt -> fetch();
    
        if ($result) {
         $message = 'wesh ce compte existe déjà';
        }
        else {
          
            $bdd->exec('insert into user($firstname,$lastname,$pwd,$email,$zipcode)');
            $_SESSION['login'] = $email;
            header('Location: tableau_de_bord.php');
            exit();
        };

    

}
}

?>

<br/>

</div>
</div>
</div> 
<!-- container fermé -->

<br/><br/><br/>
<div class="container">



<div class="card col-sm-6 offset-sm-3 col-xs-12">
  <br/>
    <h3> Déjà inscrit ? </h3>
  <br/><br/>

  <a href="login.php">
  <button type="button" class="btn btn-default btn-block">Se connecter</button>
  </a>
  <br/><br/>
</div>

</div>
</div>

</body>

</html>

