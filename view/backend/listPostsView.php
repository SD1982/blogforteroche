<?php $title = 'Administration articles'; ?>


<?php ob_start(); ?>

<?php
while ($data = $posts->fetch())
{
?>
    <div class="news">
        <div class="panel panel-default col-lg-12">
            <br/>
            <div class="panel-heading">
                <a href="#item" data-toggle="collapse">
                    <?=$data['title']?>
                        <em>le <?=$data['creation_date_fr'] ?></em>
                </a>
            </div>
            <div id="item" class="panel-collapse collapse in">
                <div class="panel-body">
                    <?=$data['posts_content'] ?>
                        <div id="adminButton">
                            <div>
                                <button data-toggle="modal" data-backdrop="false" href="#postModif" class="btn btn-primary">modifier ce post</button>
                            </div>
                            <div>
                                <button data-toggle="modal" data-backdrop="false" href="#postDelete" class="btn btn-primary">supprimer ce post</button>
                            </div>
                            <div>
                                <a class="btn btn-primary" href="index.php?action=manage&amp;id=<?= $data['id'] ?>">Consulter les commentaires</a>
                            </div>
                        </div>
                </div>
                <br/>
                <div class="container">
                    <div class="modal fade" id="postModif">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                </div>
                                <div class="modal-body">
                                    <form action="index.php?action=postUpdate&amp;id=<?=$data['id']?>" method="post">
                                        <div>
                                            <label for="title">Modifier le titre de votre article</label><br />
                                            <input type="text" class="form-control" id="title" name="title" placeholder="<?=$data['title']?>">
                                        </div>
                                        <br/>
                                        <div>
                                            <h3>Modifier le contenu de votre article</h3>
                                            <br />
                                            <textarea class="form-control" id="content" name="content"><?= $data['posts_content']?></textarea>
                                        </div>
                                        <div>
                                            <input type="submit" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br/>
                <div class="container">
                    <div class="modal fade" id="postDelete">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <button type="button" class="close" data-dismiss="modal">x</button>
                                </div>
                                <div class="modal-body">
                                    <legend>Confirmez vos identifiants</legend>
                                    <form action="index.php?action=deletePost&amp;id=<?= $data['id']?>" method="post">
                                        <div class="form-group">
                                            <label for="nom">Pseudo</label>
                                            <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo">
                                        </div>
                                        <div class="form-group">
                                            <label for="pass">Password</label>
                                            <input type="password" class="form-control" name="pass" id="pass" placeholder="Votre password">
                                        </div>
                                        <div>
                                            <input type="submit" />
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button class="btn btn-primary" data-dismiss="modal">Annuler</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <?php
}
$posts->closeCursor();
?>

    <?php $content = ob_get_clean(); ?>

    <?php require('template.php'); ?>
