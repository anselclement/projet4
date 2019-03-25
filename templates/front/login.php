<?php
$this->title = "Connection";
?>

<div class="container size">
    <div class="box">

        <form method="post" action="../public/index.php?route=login" >

            <div class="field">
                <label class="label">Pseudo</label>
                <div class="control has-text-centered has-icons-left">
                    <input class="input" type="text" id="pseudo" name="pseudo" value="<?php
                        if(isset($post['pseudo'])){
                            echo $post['pseudo'];
                        }
                    ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-user"></i>
                    </span>
                </div>
            </div>

            <div class="field">
                <label class="label">Mot de passe</label>
                <div class="control has-text-centered has-icons-left">
                    <input class="input" type="password" id="password" name="password" value="<?php
                        if(isset($post['password'])){
                            echo $post['password'];
                        }
                    ?>">
                    <span class="icon is-small is-left">
                        <i class="fas fa-lock"></i>
                    </span>
                </div>
            </div>

            <input type="submit" value="Envoyer" id="submit" name="submit" class="button is-link">

        </form>
            
            <?php
            if($post){
                if($post['pseudo'] === "" || $post['password'] === ""){?>
                    <p class="help is-danger">Rentrer un identifiant ET un mot de passe !</p>
                <?php
                }elseif(isset($error) && $error === 1){?>
                    <p class="help is-danger">Identifiant ET/OU mot de passe incorrect !</p>
                <?php
                }
            }
            ?>

    </div>
</div>
