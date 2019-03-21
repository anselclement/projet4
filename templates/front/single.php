<?php
$this->title = "Article";
?>
<div class="container size">

    <div class="box">
        <h2 class="title is-2"><?= htmlspecialchars($articles->getTitle()); ?></h2>
        <div  class="box">
            <p class="is-medium"><?= htmlspecialchars($articles->getContent()); ?></p>
        </div>
        <p><strong>Ecrit par : </strong><?= htmlspecialchars($articles->getAuthor()); ?></p>
        <p><strong>Crée le : </strong><?= htmlspecialchars($articles->getDateAdded()); ?></p>
    </div>

    <div id="comments" class="box">

        <h3 class="title is-3">Commentaires</h3>

        <?php
        foreach($comments as $comment){
        ?>
            <div class="box">
                <h4 class="title is-4"><?= htmlspecialchars($comment->getPseudo());?> :</h4>
                <p><?= htmlspecialchars($comment->getContent());?></p>
                <p><strong>Posté le : </strong><?= htmlspecialchars($comment->getDateAdded());?></p>

                <?php
                if((int)$comment->getReported() === 1){?>
                    <p class="tag is-danger is-rounded">Commentaire signalé !</p>
                <?php
                }
                elseif(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
                    ?>
                    <form method="post" action="../public/index.php?route=single">
                        <input type="hidden" id="article_id" name="idArt" value="<?= (int)$_GET['idArt'] ?>" >
                        <input type="hidden" id="idComment" name="idComment" value="<?= (int)$comment->getId() ?>">
                        <input type="submit" value="Signaler" id="submit" name="submit" class="button color-button">
                    </form>
                <?php 
                }?>
            </div>
        <?php
        }?>
    </div>
    <p id="commentValid" class="tag is-danger">Ajouter un commentaire avant de valider !</p>
    <?php

    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
    ?>
    <div>
        <form method="post" action="../public/index.php?route=single#submitcomment" >
            <input type="hidden" id="pseudo" name="pseudo" value="<?= $_SESSION['pseudo'] ?>">
            <label class="label">Ajouter un Commentaire</label><br>
            <textarea class="textarea" rows="10" id="contentcomment" name="content"><?php
                if(isset($post['content'])){
                    echo $post['content'];
                }?></textarea>
        
            <input type="hidden" id="article_id" name="idArt" value="<?= (int)$_GET['idArt'] ?>" >
            <input type="submit" value="Envoyer" id="submitcomment" name="submit" class="button color-button">
        </form>
    </div>
    <?php 
    }?>
</div>



