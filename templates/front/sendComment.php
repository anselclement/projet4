<form method="post" action="../public/index.php?route=single#submitcomment" >
    <input type="hidden" id="pseudo" name="pseudo" value="<?= $_SESSION['pseudo'] ?>">
    <label class="label">Ajouter un Commentaire</label><br>
    <textarea class="textarea" rows="5" id="contentcomment" name="content"></textarea>
    <input type="hidden" id="article_id" name="idArt" value="<?= (int)$_GET['idArt'] ?>" >
    <input type="submit" value="Envoyer" id="submitcomment" name="submit" class="button color-button">
</form>