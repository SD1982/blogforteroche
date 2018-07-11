<?php $title = 'Administration commentaires'; ?>


<?php ob_start(); ?>
<div>
    <a class="btn btn-primary" href="index.php">Retour à la liste des billets</a>
</div>
<br/>
<h2>Commentaires</h2>
<br/>
<?php
    while ($comment = $comments->fetch())
    {
?>
    <p><strong><?=$comment['author']?></strong> le
        <?= $comment['comment_date_fr'] ?>
    </p>
    <p>
        <?=$comment['comment_content']?>
    </p>
    <div>
        <a class="btn btn-primary" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">Supprimer</a>
    </div>
    <br/>
    <?php
}
?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
