<?php $title = 'billet simple pour l\'Alaska'; ?>

<?php ob_start(); ?>

<div id="errorMessage">

    <h2>ATTENTION</h2>

    <?php

echo $errorMessage;

?>
</div>

<?php $content = ob_get_clean(); ?>
<?php require('template.php'); ?>
