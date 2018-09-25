<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div class="lastPost">
    <p>Dernier billet du blog :</p>

    <div id="lastPostContainer">
<?php
while ($data = $posts->fetch()) {
    ?>
            <div>
                <h3 class="lastPostTitle">
                    <?= $data['title'] ?>
                </h3>
                <h4><em>le <?= $data['creation_date_fr'] ?></em></h4>

                <p><?= strip_tags(substr($data['posts_content'], 0, 1000)) ?></p> 
                <a class="btn btn-info" href="index.php?action=post&amp;id=<?= $data['id'] ?>">Lire la suite</a>   
            </div>
            
        <?php

    }
    $posts->closeCursor();
    ?>
    </div>
</div>


<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
