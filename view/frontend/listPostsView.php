<?php $title = 'billet simple pour l\'Alaska'; ?>


<?php ob_start(); ?>

<div class="listPosts">

    <p>Précédents billets du blog :</p>

    <?php
    while ($data = $posts->fetch()) {
        ?>
    <div class="col-lg-3">
        <h3>
            <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                <?= $data['title'] ?>
                    <em>le <?= $data['creation_date_fr'] ?></em>
            </a>
            <p><?= substr($data['posts_content'], 0, 1200) ?></p> 
        </h3>
    </div>
        
        <?php

    }
    $posts->closeCursor();
    ?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
