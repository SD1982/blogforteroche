<?php $title = 'billet simple pour l\'Alaska'; ?>


<?php ob_start(); ?>
<p><a href="index.php">Retour à la liste des billets</a></p>

<div class="news">
    <h3>
        <?= htmlspecialchars($post['title']) ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>

    <p>
        <?= nl2br(htmlspecialchars($post['posts_content'])) ?>
    </p>
    <em><a href="index.php?action=deletePost&amp;id=<?= $post['id'] ?>">Supprimer ce post</a></em>
    <em><a href="index.php?action=updatePost&amp;id=<?= $post['id'] ?>">Modifier ce post</a></em>
</div>
<br/>
<h2>Commentaires</h2>
<?php
    while ($comment = $comments->fetch())
    {
?>
    <p><strong><?= htmlspecialchars($comment['author']) ?></strong> le
        <?= $comment['comment_date_fr'] ?>
    </p>
    <p>
        <?= nl2br(htmlspecialchars($comment['comment_content'])) ?>
    </p>
    <em><a href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>">Supprimer ce commentaire</a></em>
    <?php
}
?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
