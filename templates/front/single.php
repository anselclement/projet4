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
            <div class="box" >
                <h4 class="title is-4" id="<?= (int)$comment->getId() ?>"><?= htmlspecialchars($comment->getPseudo());?> :</h4>
                <p><?= htmlspecialchars($comment->getContent());?></p>
                <p><strong>Posté le : </strong><?= htmlspecialchars($comment->getDateAdded());?></p>
                
                <?php
                if((int)$comment->getReported() === 1){?>
                    <p class="tag is-danger is-rounded">Commentaire signalé !</p>
                <?php
                }
                elseif(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){
                                        
                    include('../templates/front/reportComment.php');
                }?>
            </div>

        <?php
        }?>

    </div>

    <p id="commentValid" class="tag is-danger">Ajouter un commentaire avant de valider !</p><?php
    

    if(isset($_SESSION['id']) && isset($_SESSION['pseudo'])){

        include('../templates/front/sendComment.php');
    }?>

</div>



