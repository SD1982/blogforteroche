<?php $title = 'Se connecter'; ?>

<?php ob_start(); ?>
<div id="login">
    <div class="contact-details">
        <form method='post' action='index.php?action=verify'>
            <label>Pseudo : </label><br/>
            <input type="text" name="pseudo"><br/>
            <label>Mot de passe : </label><br/>
            <input type="password" name="pass"><br />
            <br/>
            <input type="submit" value="Envoyer">
        </form>
    </div>
</div>
<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
