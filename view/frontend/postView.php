<?php $title = 'billet simple pour l\'Alaska'; ?>



<?php ob_start(); ?>

<div>
    <a class="btn btn-info" href="index.php?action=listPosts">Retour à la liste des billets</a>
</div>
<br/>

<div class="news">
    <h3>
        <?=$post['title'] ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    <p>
        <?=$post['posts_content'] ?>
    </p>
</div>
<br/>

<div>
    <button data-toggle="modal" data-backdrop="false" href="#commentForm" class="btn btn-info">Commenter</button>
</div>
<br/>

<h2>Commentaires</h2>
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

<?php
    while ($comment = $comments->fetch())
    {
?>
    <p>

        <strong><?=htmlspecialchars($comment['author'])?></strong> le
        <?=$comment['comment_date_fr']?>
    </p>
    <p>
        <?=htmlspecialchars($comment['comment_content'])?>
    </p>

    <div>
        <a class="btn btn-danger" href="index.php?action=signalComment&amp;id=<?=$comment['id'] ?>&idPost=<?= $post['id'] ?>">Signaler</a>
    </div>
    <br/>

    <?php
}
?>

    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
