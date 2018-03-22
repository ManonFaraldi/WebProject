<doctype!>

<html>
<head>
<meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">
</head>

<body>
<nav class="container">
<table>
<tr> <td>
<a href="index.php"><img src="images/generation_logo.png" alt="Logo Génération.s"></a>
</td>
<td>
<a href="index.php"><h1> Les Jeunes Génération.s <br/> Gironde </h1><a>
</td>
<td>
<p>
    <br/>
    <a class="bleu" href="connexion.php" >Se connecter</a><br/>
    <a class="rose2" href="inscription.php" >S'inscrire</a><br/>
    <a class="navi" href="presentation.php" >Présentation</a><br/>
    <a class="navi" href="actions.php" >Actions</a><br/>
    <a class="navi" href="articles.php" >Articles</a><br/>
    <a class="navi" href="https://www.generation-s.fr/" >Site national</a>
    <?php
    if (isset($_SESSION['role'])) {
    if ( $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
    {
     ?>
    <a class="navi" href="_admin/gestion_articles.php" >Gestion des Articles</a><br/>
    <a class="navi" href="_admin/gestion_actions.php" >Gestion des Actionss</a><br/>
    <?php
    }
    ?>

<?php
    if ($_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
    {
     ?>
    <a class="navi" href="_admin/gestion_utilisateurs.php" >Gestion des Utilisateurs</a><br/>
    <?php
    }

    }
    ?>
</p>
</td>
</tr>
</table>

</nav>

