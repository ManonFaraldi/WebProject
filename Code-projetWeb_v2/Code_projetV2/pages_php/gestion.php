<?php
    session_start();
    require_once "../includes/functions.php"; 
    require_once "../includes/header.php";
?>
<section class="wrapper">
        <div class="content">
            <div class="container">
                <div class="row">
                <?php

                    if (isset($_SESSION['role'])) {
                        if ( $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
                        {
                ?>
                    <div class="col-xs-12 col-sm-6">
                            <div class="card">
                                <div class="card-content">
                                    <h4 < class="card-title">
                                        <a class="navi" href="../_admin/gestion_articles.php" >Gestion Articles</a>
                                        <a class="glyphicon glyphicon-file"></a><br/>
                                    </h4>
                                </div>
                            </div>
                    </div>
                    <div class="col-xs-12 col-sm-6">
                            <div class="card-jaune">
                                <div class="card-content">
                                    <h4 class="card-title">
                                    <a class="navi" href="../_admin/gestion_actions.php" >Gestion Actions</a>
                                    <a class="glyphicon glyphicon-bullhorn"></a><br/>
                                    </h4>
                                </div>
                            </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-12 col-sm-6">
                            <div class="card-blue">
                                <div class="card-content">
                                    <h4 class="card-title">
                                    <a class="navi" href="../_admin/gestion_commentaire.php" >Gestion Commentaires</a>
                                    <a class="glyphicon glyphicon-comment"></a><br/>
                                    </h4>
                                </div>
                            </div>
                    </div>
                <?php
                        }         
                        if ($_SESSION['role'] == "ADMIN")
                        {
                ?>
                    <div class="col-xs-12 col-sm-6">
                        <div class="card">
                            <div class="card-content">
                                <h4 class="card-title">
                                <a class="navi" href="../_admin/gestion_utilisateurs.php" >Gestion Utilisateurs</a>
                                <a class="glyphicon glyphicon-user"></a><br/>
                                </h4>
                            </div>
                        </div>
                    </div>
                <?php
                        }
                    }
                 ?>
                </div>
            </div>
        </div>
</section>