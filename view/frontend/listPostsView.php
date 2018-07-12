<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div>
    <a class="btn btn-primary" href="index.php">Retour à l'accueil</a>
</div>
<br/>

<p>Précédents billets du blog :</p>

<?php
while ($data = $posts->fetch())
{
?>
    <h3>
        <a href="index.php?action=post&amp;id=<?=$data['id']?>">
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
