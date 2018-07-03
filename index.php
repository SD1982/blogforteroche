<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Billet simple pour l'Alaska</title>
    <!-- favicon -->
    <link rel="shortcut icon" href="">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap-theme.min.css">
    <!-- fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
</head>

<body>
    <!-- integration du menu/header -->
    <?php include("header.php"); ?>

    <div class="container">
        <div class="starter-template">
            <h1>Billet simple pour l'Alaska</h1>
            <p>Derniers billets du blog :</p>
        </div>
    </div>

    <?php 
    //Connexion a la base de données
    try{
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','');
    }
    catch(Exception $e){
        die ('Erreur :' .$e->getMessage());
    }
    
    //On récupère les 5 derniers posts
    $req = $bdd->query('SELECT id, title, posts_content, creation_date FROM posts ORDER BY creation_date');
    while($donnees= $req->fetch())
        {
?>
    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['title']); ?>
            <em>le <?php echo $donnees['creation_date']; ?></em>
        </h3>

        <p>
            <?php
    // On affiche le contenu du billet
    echo nl2br(htmlspecialchars($donnees['posts_content']));
    ?>
                <br />
                <em><a href="commentaires.php?billet=<?php echo $donnees['id']; ?>">Commentaires</a></em>
        </p>
    </div>
    <?php
} // Fin de la boucle des billets
$req->closeCursor();
?>

        <!-- intégration du footer -->
        <?php include("footer.php"); ?>

        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
