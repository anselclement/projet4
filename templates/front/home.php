<?php
$this->title = "Accueil";
?>

<section id="intro">
    <div class="container has-text-centered bienvenue">
        <h2 id="roman" class="title is-1">Billet simple pour l'Alaska</h2>
        <a href="#decouvrir"><input type="button"  value="Découvrir" class="button is-medium color-button is-rounded"></a>
    </div>
</section>

<div id="decouvrir"></div>

<section class="container size">

    <?php
    foreach ($articles as $article)
    {
    ?>
        <div class="box chapitre">
            <a href="../public/index.php?route=article&idArt=<?= htmlspecialchars($article->getId());?>" class="chapter">
                <article class="media">
                    <div class="media-left is-hidden-mobile">
                        <figure class="image">
                            <img src="../public/img/test.jpg" alt='image'>
                        </figure>
                    </div>
                    <div class="media-content">
                        <div class="content">
                            <h2><?= htmlspecialchars($article->getTitle());?></h2>
                            <p><?= $article->getContent();?></p>
                            <p><?= htmlspecialchars($article->getAuthor());?></p>
                            <p><strong>Date d'ajout :</strong> <?= htmlspecialchars($article->getDateAdded());?></p>
                        </div>
                    </div>
                </article>
            </a>
        </div>

        <div class="field is-grouped">

            <?php
            if(!$_SESSION){}
            elseif(isset($_SESSION) && $_SESSION['role'] === 'administrateur'){
            
                include('../templates/back/deleteArticle.php');?>

                <p class="control">
                    <form method="post" action="../public/index.php?route=addArticle">
                        <input type="hidden" id="idArt" name="idArt" value=" <?= $article->getId(); ?>">
                        <input type="hidden" id="title" name="title" value=" <?= $article->getTitle(); ?>">
                        <input type="hidden" id="content" name="content" value=" <?= $article->getContent(); ?>">
                        <input type="submit" value="Editer" id="submit" name="fds" class="button color-button">
                    </form>
                </p>

            <?php
            }?>
            
        </div>

    <?php
    }?>

</section>


