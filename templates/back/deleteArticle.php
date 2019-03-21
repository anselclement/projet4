<form method="post" action="../public/index.php?route=deleteArticle">
    <input type="hidden" id="idArt" name="idArt" value=" <?= $article->getId(); ?>">
    <input type="submit" value="Supprimer" id="submit" name="submit" class="button color-button">
</form>
