<p class="control">
    <form method="post" action="../public/index.php?route=deleteComment">
        <input type="hidden" id="idComment" name="idComment" value="<?= (int)$comment->getId() ?>">
        <input type="submit" value="Supprimer" id="submit" name="submit" class="button color-button"></a>
    </form>
</p>