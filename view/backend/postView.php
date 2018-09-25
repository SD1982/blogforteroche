<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div>
    <a class="btn btn-info" href="index.php?action=adminListPosts">Retour à la liste des billets</a>
</div>
<br/>

<div class="news">
    <h3>
        <?= $post['title'] ?>
            <em>le <?= $post['creation_date_fr'] ?></em>
    </h3>
    <h3>
        <?= $post['posts_content'] ?>
    </h3>
</div>
<br/>

<div class="adminButton">
    <div>
        <button data-toggle="modal" data-backdrop="false" href="#postModif" class="btn btn-success">modifier ce post</button>
    </div>
    <div>
        <button data-toggle="modal" data-backdrop="false" href="#postDelete" class="btn btn-danger">supprimer ce post</button>
    </div>
</div>
<br/>

<h2>Commentaires (<?= $totalComments ?>)</h2>
<div class="container">
    <div class="modal fade" id="commentForm">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=adminAddComment&amp;id=<?= $post['id'] ?>" method="post">
                        <div>
                            <label for="author">Votre pseudo</label><br />
                            <input type="text" class="form-control" id="author" name="author" placeholder='Jean Forteroche' />
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

<div class="container">
    <div class="modal fade" id="postModif">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <form action="index.php?action=postUpdate&amp;id=<?= $post['id'] ?>" method="post">
                        <div>
                            <label for="title">Modifier le titre de votre article</label><br />
                            <input type="text" class="form-control" id="title" name="title" placeholder="<?= $post['title'] ?>">
                        </div>
                        <br/>
                        <div>
                            <h3>Modifier le contenu de votre article</h3>
                            <br />
                            <textarea class="form-control" id="content" name="content"><?= $post['posts_content'] ?></textarea>
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" />
                            <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
    <div class="modal fade" id="postDelete">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">x</button>
                </div>
                <div class="modal-body">
                    <legend>Confirmez vos identifiants</legend>
                    <form action="index.php?action=deletePost&amp;id=<?= $post['id'] ?>" method="post">
                        <div class="form-group">
                            <label for="nom">Pseudo</label>
                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo">
                        </div>
                        <div class="form-group">
                            <label for="pass">Password</label>
                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Votre password">
                        </div>
                        <div>
                            <input type="submit" class="btn btn-success" />
                            <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
while ($comment = $comments->fetch()) {
    ?>
    <div class="news">
        <h3>
            <strong><?= $comment['author'] ?></strong> le
            <?= $comment['comment_date_fr'] ?>
        </h3>
        <p>
            <?= $comment['comment_content'] ?>
        </p>
        <div> <a class="btn btn-danger" href="index.php?action=deleteComment&amp;id=<?= $comment['id'] ?>&idPost=<?= $post['id'] ?>">Supprimer</a>
        </div>
        <br/>
    </div>

    <?php

}
?>
<div>
        <button data-toggle="modal" data-backdrop="false" href="#commentForm" class="btn btn-success">Commenter</button>
</div>
    <?php $content = ob_get_clean(); ?>
    <?php require('template.php'); ?>
