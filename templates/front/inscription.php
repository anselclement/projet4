<?php
$this->title = "Inscription";
?>

<div  class="size container ">
    <div class="box ">

        <form method="post" action="../public/index.php?route=inscription">

            <?php if(isset($error) && $error['pseudo'] === 0){?>

                <div class="field">
                    <label class="label ">Pseudo</label>
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

            <?php
            }else{?>

                <div class="field">
                    <label class="label ">Pseudo</label>
                    <div class="control has-text-centered has-icons-left has-icons-right">
                        <input class="input is-danger" type="text" id="pseudo" name="pseudo" value="<?php
                            if(isset($post['pseudo'])){
                                echo $post['pseudo'];
                            }
                        ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-user"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <?php if(isset($error) && $error['pseudo'] === 1){?>
                        <p class="help is-danger">Le pseudo doit commencer par une majuscule</p>
                    <?php
                    }elseif(isset($error) && $error['pseudo'] === 2){?>
                        <p class="help is-danger">Le pseudo est déjà pris !</p>
                    <?php
                    }?>
                </div>

            <?php
            }?>
            

            <?php if(isset($error) && $error['mail'] === 0){?>

                <div class="field">
                    <label class="label">Mail</label>
                    <div class="control has-text-centered has-icons-left">
                        <input class="input" type="mail" id="mail" name="mail" value="<?php
                            if(isset($post['mail'])){
                                echo $post['mail'];
                            }
                        ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                    </div>
                </div>

            <?php
            }else{?>

                <div class="field">
                    <label class="label">Mail</label>
                    <div class="control has-text-centered has-icons-left has-icons-right">
                        <input class="input is-danger" type="mail" id="mail" name="mail" value="<?php
                            if(isset($post['mail'])){
                                echo $post['mail'];
                            }
                        ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-envelope"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">Format du mail incorrect !</p>
                </div>

            <?php
            }?>
            
            <?php if(isset($error) && $error['password'] === 0){?>

                <div class="field">
                    <label class="label">Mot de passe</label>
                    <div class="control has-text-centered has-icons-left ">
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

            <?php
            }else{?>

                <div class="field">
                    <label class="label">Mot de passe</label>
                    <div class="control has-text-centered has-icons-left has-icons-right">
                        <input class="input is-danger" type="password" id="password" name="password" value="<?php
                            if(isset($post['password'])){
                                echo $post['password'];
                            }
                        ?>">
                        <span class="icon is-small is-left">
                            <i class="fas fa-lock"></i>
                        </span>
                        <span class="icon is-small is-right">
                            <i class="fas fa-exclamation-triangle"></i>
                        </span>
                    </div>
                    <p class="help is-danger">Mot de passe invalide ! Doit commencer par une majuscule et contenir au moins un chiffre et un caractère spécial !</p>
                </div>
                
            <?php
            }?>
            
            <input type="submit" value="Envoyer" id="submit" name="submit" class="button is-link">
        </form>
    </div>
</div>
