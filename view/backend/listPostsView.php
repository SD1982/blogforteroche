<?php $title = 'Administration articles'; ?>

<?php ob_start(); ?>
<!--listes des articles -->
<div class="listPosts">
    <div class="listPostTitle">
        <h2>liste des billets du blog :</h2>
    </div>
    <div id="listPostContainer">
    <?php
    while ($data = $posts->fetch()) {
        ?>
            <div>
                <h3>
                    <a href="index.php?action=adminPost&amp;id=<?= $data['id'] ?>">
                    <?= $data['title'] ?>...
                    <em>le <?= $data['creation_date_fr'] ?></em>
                    </a>
                </h3>
            </div>
        <?php

    }
    $posts->closeCursor();
    ?>
    </div>
</div>

<?php $content = ob_get_clean(); ?>

<?php require('template.php'); ?>
