<p class="control">
    <form method="post" action="../public/index.php?route=cancelReportComment">
        <input type="hidden" id="idComment" name="idComment" value="<?= (int)$comment->getId() ?>">
        <input type="submit" value="Annuler" id="submit" name="submit" class="button color-button"></a>
    </form> 
</p>