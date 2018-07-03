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
    
    while($data= $posts->fetch())
    { 
    ?>
        <div class="news">
            <h3>
                <?php echo htmlspecialchars($data['title']); ?>
                <em>le <?php echo $data['creation_date_fr']; ?></em>
            </h3>
            <p>
                <?php
            echo nl2br(htmlspecialchars($data['posts_content']));
            ?>
                    <br />
                    <em><a href="comments.php?post=<?php echo $data['id']; ?>">Commentaires</a></em>
            </p>
        </div>

        <?php
    }
    $posts->closeCursor();
    ?>
            <!-- intégration du footer -->
            <?php include("footer.php"); ?>

            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
            <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
</body>

</html>
