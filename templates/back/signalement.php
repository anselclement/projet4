<div class="container size">
    <div class="box">

        <h2 class="title is-3">Commentaires signalés</h2>

        <?php 
        foreach($comments as $comment){
        ?>

            <div class="box">
                <h4 class="title is-4"><?= htmlspecialchars($comment->getPseudo());?></h4>
                <p class="content"><?= htmlspecialchars($comment->getContent());?></p>
                <p><strong>Posté le :</strong> <?= htmlspecialchars($comment->getDateAdded());?></p>
            </div>

            <div class="field is-grouped">
                <?php include('../templates/back/deleteComment.php');?>
                <?php include('../templates/back/cancelReportComment.php');?>
            </div>

        <?php
        }?>
        
    </div>
</div>

