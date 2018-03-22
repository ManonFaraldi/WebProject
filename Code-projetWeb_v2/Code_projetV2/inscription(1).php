
<?php require_once "includes/header.php"; ?>

<div class="container">
<div class="card col-sm-6 offset-sm-3 col-xs-12">
    <br/>
  <h3>S'inscrire</h3>
  <? php 
  if empty($_GET['$message']) ;
  else { echo"$message";}
  ?>
  <br/>
  <form action="" method="POST">
   
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
      <a href="inscription2.php">
       <button type="button" class="btn btn-default btn-block">S'inscrire</button>
      </a>
  </form>

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