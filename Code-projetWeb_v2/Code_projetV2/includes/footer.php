<footer class="footer">
    <hr width="75%" size= 2>
    
    <body>
        <nav class="container">
            <div class="row">

                <div class="col-lg-8">
                Site réalisé dans le cadre de l'UE Programmation Web </br> par Vincent BERNARD et Manon FARALDI de l'<a href="https://www.ensc.fr" id = "ensc"> ENSC</a>.
                </div>
                <div class="col-lg-4">
                <?php
                    if (isset($_SESSION['role'])) {
                        if ( $_SESSION['role'] == "MEMBRE" ||  $_SESSION['role'] == "MOD" ||  $_SESSION['role'] == "ADMIN")
                        {
                        ?>
                            <a class="bleu" href="logout.php" >Se déconnecter</a><br/>
                            <a class="rose2" href="../pages_php/tableau_de_bord.php" >Mon profil</a><br/>

                        <?php
                        }
                    }else{
                        ?>
                        <a class="bleu" href="../pages_php/connexion.php" >Se connecter</a><br/>  
                        <a class="rose2" href="../pages_php/inscription.php" >S'inscrire</a><br/>

                        <?php
                    }
                    ?>
                </div>
            </div>       
        </nav>
</footer>