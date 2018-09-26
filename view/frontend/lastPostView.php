<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<!--listes des 3 derniers articles -->
<div class="lastPost">
    <div class="lastPostTitle">
        <h3>Dernier billet du blog :</h3>
    </div>
    <div id="lastPostContainer">
<?php
while ($data = $posts->fetch()) {
    ?>
           <div>
                <h3>
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                        <?= $data['title'] ?>...
                        <em>le <?= $data['creation_date_fr'] ?></em>
                    </a>  
                </h3>
                    <a href="index.php?action=post&amp;id=<?= $data['id'] ?>">
                        <img src=<?= $data['url_miniature'] ?> alt="">
                    </a>
                <br/>
                <p><?= strip_tags(substr($data['posts_content'], 0, 500)) ?> ...</p> 
                <br/>
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
