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
    // Récupération du billet
     $req = $bdd->prepare('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
     $req->execute(array($_GET['post']));
     $donnees = $req->fetch();
?>

    <div class="news">
        <h3>
            <?php echo htmlspecialchars($donnees['title']); ?>
            <em>le <?php echo $donnees['creation_date_fr']; ?></em>
        </h3>

        <p>
            <?php
    echo nl2br(htmlspecialchars($donnees['posts_content']));
    ?>
        </p>
    </div>

    <h2>Commentaires</h2>

    <?php
    $req->closeCursor(); // Important : on libère le curseur pour la prochaine requête

    // Récupération des commentaires
    $req = $bdd->prepare('SELECT author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM commentaires WHERE posts_id = ? ORDER BY comment_date');
    $req->execute(array($_GET['post']));

    while ($donnees = $req->fetch())
{
?>
        <p><strong><?php echo htmlspecialchars($donnees['author']); ?></strong> le
            <?php echo $donnees['comment_date_fr']; ?>
        </p>
        <p>
            <?php echo nl2br(htmlspecialchars($donnees['comment_content'])); ?>
        </p>
        <?php
} // Fin de la boucle des commentaires
$req->closeCursor();
?>

            <!-- intégration du footer -->
            <?php include("footer.php"); ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
