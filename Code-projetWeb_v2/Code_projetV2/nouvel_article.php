<?php require_once "includes/header.php"; ?>


<div class="container">



<div class="card col-sm-8 offset-sm-3 col-xs-12">
    <br/>
  <h3>Nouvel article</h3>
  <br/>
  <form action="enregistre_article.php" method="POST">
   
        <input type="text" required
        class="form-control form__input"
        id="titre" name="titre" placeholder="Titre"
        value=""
        />
    <br/><br/> 
    
    <textarea required rows="4"
        class="form-control form__input"
        id="resume" name="resume" placeholder="Résumé" value="">
        </textarea>
    <br/><br/> 

    <textarea required rows="10"
        class="form-control form__input"
        id="contenu" name="contenu" placeholder="Contenu" value="">
        </textarea>

    
    
    
    <br/><br/>
    <input type="hidden" name="action" value="join" />

	<button type="submit" class="btn btn-default btn-block">Enregistrer</button>

       
  </form>

  <br/><br/>
</div>
</div>

</body>
</html>

