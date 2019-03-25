<form method="post" action="../public/index.php?route=single#<?= (int)$comment->getId() ?>">
    <input type="hidden" id="article_id" name="idArt" value="<?= (int)$_GET['idArt'] ?>" >
    <input type="hidden" id="idComment" name="idComment" value="<?= (int)$comment->getId() ?>">
    <input type="submit" value="Signaler" id="submit" name="submit" class="button color-button">
</form>