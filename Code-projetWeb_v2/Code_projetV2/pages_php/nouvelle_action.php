<?php require_once "../includes/header.php"; ?>


<div class="container">



<div class="card col-sm-8 offset-sm-3 col-xs-12">
    <br/>
  <h3>Nouvelle action</h3>
  <br/>
  <form action="enregistre_action.php"  enctype="multipart/form-data" method="POST">
   
        <input type="text" required
        class="form-control form__input"
        id="titre" name="titre" placeholder="Titre"
        value=""
        />
    <br/>

    <h3> Insérer une image </h3>
    <br/>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <br/>
    <input type="text" required
        class="form-control form__input"
        id="lieu" name="lieu" placeholder="Lieu où doit se dérouler l'action"
        value=""
    />
    <br/>
    <textarea required rows="10"
        class="form-control form__input"
        id="sujet" name="sujet" placeholder="Résumée de façon détaillée en quoi consiste l'action que vous voulez mener" 
        value="">
        </textarea>

    
    
    
    <br/><br/>
    <input type="hidden" name="action" value="join" />

	<button type="submit" value="Upload Image" class="btn btn-default btn-block">Proposer</button>

       
  </form>

  <br/><br/>
</div>
</div>

</body>
</html>

