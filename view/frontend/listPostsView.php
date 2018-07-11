<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<p>Derniers billets du blog :</p>


<?php
while ($data = $posts->fetch())
{
?>

    <h3>
        <?=$data['title']?>
            <em>le <?= $data['creation_date_fr'] ?></em>
    </h3>

    <?= $data['substr(posts_content, 1, 1000)']?>
        <br />
        <div>
            <a class="btn btn-primary" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a>
        </div>

        <?php
}
$posts->closeCursor();
?>
        <?php $content = ob_get_clean(); ?>
        <?php require('template.php'); ?>
