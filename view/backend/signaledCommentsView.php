<?php $title = 'Commentaires signalés'; ?>
<?php ob_start(); ?>
<div>
    <a class="btn btn-primary" href="index.php">Retour à la liste des billets</a>
</div>
<br/>
<br/>
<?php
    while ($signaled = $signaledComments->fetch())
    {
?>
    <div>
        <p><strong><?=$signaled['author']?></strong> le
            <?= $signaled['comment_date_fr'] ?>
        </p>
        <p>
            <?=$signaled['comment_content']?>
        </p>
        <div>
            <a class="btn btn-primary" href="index.php?action=validateSignaledComment&amp;id=<?= $signaled['id'] ?>">Valider</a>
        </div>
        <div>
            <a class="btn btn-primary" href="index.php?action=deleteSignaledComment&amp;id=<?= $signaled['id'] ?>">Supprimer</a>
        </div>
        <br/></div>


    <?php
}
?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
