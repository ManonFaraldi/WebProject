<?php session_start(); ?>
<?php require_once "../includes/header.php"; ?>
<?php $today = date("d.m.y");   ?>

<div class="container">



<div class="card col-sm-8 offset-sm-3 col-xs-12">
    <br/>
  <h3>Nouveau Commentaire</h3>
  <br/>
  <form action="poster_commentaire.php" method="POST">

<?php echo '<input type="Hidden" name="user_commentaire" value="'.$_SESSION['ID_USER'].'"/>'; ?>
<?php echo '<input type="Hidden" name="date_commentaire" value="'.$today.'"/>'; ?>
<?php echo '<input type="Hidden" name="id_article" value="'.$_GET["titre"].'"/>'; ?>
   
    <textarea required rows="10"
        class="form-control form__input"
        id="contenu" name="contenu" placeholder="Contenu" value="">
        </textarea>

    <br/><br/>
    <input type="hidden" name="action" value="join" />

	<button type="submit" class="btn btn-default btn-block">Poster</button>

       
  </form>

  <br/><br/>
</div>
</div>

</body>
</html>

