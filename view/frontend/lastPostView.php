<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<p>Dernier billet du blog :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <h3>
        <?=$data['title']?>
            <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <?= $data['posts_content']?>
        <a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Commentaires</a>

        <?php
}
$posts->closeCursor();
?>
        <?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>
