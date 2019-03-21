<header>
<nav class="navbar is-transparent color-principal is-fixed-top">
    <div class="container">
        <div class="navbar-brand">
            <h1 class="title is-1"><a href="../public/index.php" class="navbar-item" id="logo">Jean Forteroche</a></h1>
            <span class="navbar-burger burger" data-target="navMenu">
                <span></span>
                <span></span>
                <span></span>
            </span>
        </div>
        <?php
        if(isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role']) && $_SESSION['role'] === 'administrateur'){?>
            <div id="navMenu" class="navbar-menu has-text-centered color-principal">
                <div class="navbar-item navbar-end"><strong><?php echo 'Bienvenue ' . $_SESSION['pseudo'];?></strong></div>
                <a href=" ../public/index.php?route=deconnexion" class="navbar-item"><input type="button"  value="Déconnexion" class="button  is-fullwidth color-button"></a>
                <a href="../public/index.php?route=dashboard" class="navbar-item"><input type="button"  value="dashboard" class="button  is-fullwidth color-button"></a>
            </div>
        <?php
        }
        elseif(isset($_SESSION['id']) && isset($_SESSION['pseudo']) && isset($_SESSION['role'])  && $_SESSION['role'] === 'abonné'){?>
            <div id="navMenu" class="navbar-menu has-text-centered color-principal">
                <div class="navbar-item navbar-end "><?php echo 'Bienvenue ' . $_SESSION['pseudo'];?></div>
                <a href=" ../public/index.php?route=deconnexion" class="navbar-item"><input type="button"  value="Déconnexion" class="button  is-fullwidth color-button"></a>
                <a href="../public/index.php" class="navbar-item"><input type="button"  value="accueil" class="button  is-fullwidth color-button"></a>
            </div>
        <?php
        }
        else{?>
            <div id="navMenu" class="navbar-menu color-principal">
                <a href="../public/index.php?route=inscription" class="navbar-item navbar-end"><input type="button"  value="Inscription" class="button  is-fullwidth color-button"></a>
                <a href="../public/index.php?route=login" class="navbar-item"><input type="button"  value="connexion" class="button is-fullwidth color-button"></a>
            </div>
        <?php
        }
        ?>
    </div>
</nav>
</header>