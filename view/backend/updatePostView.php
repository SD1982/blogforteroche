<?php $title = 'Modifier votre article'; ?>

<?php ob_start(); ?>
<form>
    <div>
        <h3>Modifier le titre de votre article</h3>
        <br />
        <textarea id="title" name="title"><?= htmlspecialchars($post['title']) ?></textarea>
    </div>
    <br/>
    <div>
        <h3>Modifier le contenu de votre article</h3>
        <br />
        <textarea id="posts_content" name="posts_content"><?= nl2br(htmlspecialchars($post['posts_content'])) ?></textarea>
    </div>
    <div>
        <input type="submit" />
    </div>
</form>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
