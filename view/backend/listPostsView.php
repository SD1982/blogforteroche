<?php $title = 'billet simple pour l\'Alaska'; ?>


<?php ob_start(); ?>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <h3>
            <em><a href="index.php?action=manage&amp;id=<?= $data['id'] ?>"><?= htmlspecialchars($data['title']) ?></a></em>
            <em>le <?= $data['creation_date_fr'] ?></em>
        </h3>

        <p>
            <?= nl2br(htmlspecialchars($data['posts_content'])) ?>
        </p>
    </div>
    <?php
}
$posts->closeCursor();
?>
    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
