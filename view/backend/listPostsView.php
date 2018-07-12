<?php $title = 'Administration articles'; ?>

<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>
    <h3>
        <a href="index.php?action=adminPost&amp;id=<?=$data['id']?>">
            <?=$data['title']?>
                <em>le <?= $data['creation_date_fr'] ?></em>
        </a>
    </h3>
    <?php
}
$posts->closeCursor();
?>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
