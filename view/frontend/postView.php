<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>
<!--contenu de l'article -->
<div class="news">
    <div class="newsContainer">
        <div class="postTitle">
            <h3>
                <?= $post['title'] ?>
                <em>le <?= $post['creation_date_fr'] ?></em>
            </h3>
        </div>
        <div class="postContent">
            <div class="postImage">
                <img src=<?= $post['url_image'] ?> alt="<?= $post['title'] ?>">
            </div>
            <br/>
            <div class="postText">
                <p>
                    <?= $post['posts_content'] ?>
                </p>
            </div>
        </div>
    </div>
</div>
<br/>
<!--fenetre modal du formulaire d'ajout de commentaire -->
<div class="container">
        <div class="modal fade" id="commentForm">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal">x</button>
                    </div>
                    <div class="modal-body">
                        <form action="index.php?action=addComment&amp;id=<?= $post['id'] ?>" method="post">
                            <div>
                                <label for="author">Votre pseudo</label><br />
                                <input type="text" class="form-control" id="author" name="author" placeholder="Votre pseudo" />
                            </div>
                            <br />
                            <div>
                                <label for="comment">Commentaire</label><br />
                                <textarea class="form-control" id="comment" name="comment" placeholder="Votre commentaire"></textarea>
                            </div>
                            <br/>
                            <input type="submit" class="btn btn-success" />
                            <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

<!--contenu des commentaires de l'article -->    
<div class="postComments" id="comments">
    <h2>Commentaires (<?= $totalComments ?>)</h2>
<?php
while ($comment = $comments->fetch()) {
    ?>

    <p>
        <strong><?= htmlspecialchars($comment['author']) ?></strong> le
        <?= $comment['comment_date_fr'] ?>
        <a  href="index.php?action=signalComment&amp;id=<?= $comment['id'] ?>&idPost=<?= $post['id'] ?>">Signaler</a>
    </p> 
    <p>
        <?= htmlspecialchars($comment['comment_content']) ?>
    </p>
    <br/>
    <?php

}
?>
    <div>
        <button data-toggle="modal" data-backdrop="false" href="#commentForm" class="btn btn-info">Commenter</button>
    </div>
</div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
