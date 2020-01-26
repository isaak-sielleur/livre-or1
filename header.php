<header>
    <nav>
        <ul>
            <li><a href="index.php">Presentation</a></li>
            <li><a href="livre-or.php">Le livre d'Or</a></li>
            <?php
                if(!isset($_SESSION['login']))
                { 
            ?>
            <li><a href="inscription.php">Inscription</a></li>
            <li><a href="connexion.php">Connexion</a></li>
            <?php
                }
                else
                {
            ?>
            <li><a href="commentaire.php">Ajouter un commentaire</a></li>
            <li><a href="profil.php">Modifier le profil</a></li>
            <li><a href="index.php?deco=true">Deconnexion</a></li>
            <?php
            
                }
            
            ?>
        </ul>
    </nav>

    <div class="header">
        <div class="header__bg"></div>
        <h1>Livre d'Or</h1>
    </div>
</header>

