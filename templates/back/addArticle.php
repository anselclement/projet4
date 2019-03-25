<div class="container size">
    <div class="box">
        <?php 
        if(isset($error) && $error === 1){?>
                <p class="tag is-danger ">Ajouter un titre ET du contenu avant de valider !</p>
        <?php
        }?>

        <form method="post" action="../public/index.php?route=addArticle">

            <div class="field">
                <label class="label">Titre</label>
                <div class="control">
                    <input class="input" type="text" id="title" name="title" value="<?php
                        if(isset($post['title'])){
                            echo $post['title'];
                        }
                    ?>">
                </div>
            </div>

            <div class="field">
                <label class="label">Contenu</label>
                <div class="control">
                    <textarea class="textarea" rows="15" id="contentArticle" name="content"><?php
                        if((isset($post['content']))){
                            echo ($post['content']);
                        }?>
                    </textarea>
                </div>
            </div>
            
            <?php if(isset($post['idArt'])){ 
                include('../templates/back/editArticle.php');
            }
            else{?>
                <input type="submit" value="Envoyer" class="button color-button" id="submit" name="submit">
            <?php
            }?>

        </form>
        <a href="../public/index.php"><input type="submit" value="Acceuil" id="submit" name="submit" class="button color-button"></a>
    </div>
</div>


