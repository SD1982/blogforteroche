<?php $title = 'Commentaires signalés'; ?>

<?php ob_start(); ?>
<h2>Commentaires (<?= $totalSignaled ?>)</h2>
<?php
while ($signaled = $signaledComments->fetch()) {
    ?>
    <div class="news">
        <p><strong><?= htmlspecialchars($signaled['author']) ?></strong> le
            <?= $signaled['comment_date_fr'] ?>
        </p>
        <p>
            <?= htmlspecialchars($signaled['comment_content']) ?>
        </p>
    </div>
    <br/>

    <div class="adminButton">
        <div>
            <a class="btn btn-success" href="index.php?action=validateSignaledComment&amp;id=<?= $signaled['id'] ?>">Valider</a>
        </div>
        <div>
            <a class="btn btn-danger" href="index.php?action=deleteSignaledComment&amp;id=<?= $signaled['id'] ?>">Supprimer</a>
        </div>
    </div>
    <br/>

    <?php

}
?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
