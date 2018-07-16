<!DOCTYPE html>


<html lang="fr">

<head>

    <title>
        <?= $title ?>
    </title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Blog de jean forteroche l'histoire de mon voyage en aller simple vers l'alaska">
    <meta name="author" content="Jean forteroche">

    <!-- Fontawesome -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.10/css/all.css" integrity="sha384-+d0P83n9kaQMCwj8F4RJB66tzIwOKmrdb46+porD/OvrJ+37WqIM7UoBtwHO6Nlg" crossorigin="anonymous">
    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="/favicon.ico" />
    <link rel="shortcut icon" type="image/x-icon" href="/favicon.ico" />
    <!-- CSS -->
    <link href="/public/css/style.css" rel="stylesheet" />

    <!-- Twitter Card data -->
    <meta name="twitter:card" content="summary" />
    <!-- Open Graph data -->
    <meta property="og:title" content="Forteroche billet simple pour l'alaska" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="www.projet4.wedostedec.com" />
    <meta property="og:image" content="" />
    <meta property="og:description" content="Retrouvez le récit de mon voyage sans retour vers l'alaska" />

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/css/bootstrap.min.css" integrity="sha384-9gVQ4dYFwwWSjIDZnLEWnxCjeSWFphJiwGPXr1jddIhOegiu1FwO5qRGvFXOdJZ4" crossorigin="anonymous">

</head>

<body>
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-info" class="button" href="index.php">Accueil</a>
                </li>
                <li class="nav-item active">
                    <a class="btn btn-info" class="button" href="index.php?action=listPosts">Articles précedents</a>
                </li>
            </ul>
        </div>
        <div>
            <button data-toggle="modal" data-backdrop="false" href="#formulaire" class="btn btn-success">Admin</button>
        </div>
    </nav>
    <main role="main" class="container">
        <div class="starter-template">
            <h1>
                <?= $title ?>
            </h1>
        </div>
        <div class="container">
            <div class="modal fade" id="formulaire">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?action=login" method="post">
                                <div class="form-group">
                                    <label for="nom">Pseudo</label>
                                    <input type="text" class="form-control" name="pseudo" id="pseudo" placeholder="Votre pseudo">
                                </div>
                                <div class="form-group">
                                    <label for="pass">Password</label>
                                    <input type="password" class="form-control" name="pass" id="pass" placeholder="Votre password">
                                </div>
                                <button type="submit" class="btn btn-success">Envoyer</button>
                                <button class="btn btn-danger" data-dismiss="modal">Annuler</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <?= $content ?>
    </main>

    <footer id="contact">
        <nav>
            <ul id="menuReseaux">
                <li><a href="#"><i class="fab fa-twitter"></i></a></li>
                <li><a href="#"><i class="fab fa-facebook-f"></i></a></li>
                <li><a href="#"><i class="fab fa-instagram"></i></a></li>
                <li><a href="#"><i class="far fa-envelope"></i></a></li>
            </ul>
        </nav>
        <p class="copyright"><i class="far fa-copyright"> Copyright Jean Forteroche 2018</i> Publié le 14 Juillet 2018</p>
        <p class="mailContact">Contact information: <a href="mailto:someone@example.com">someone@example.com</a>.</p>
    </footer>

    <script src="assets/js/jquery.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>
    <script src="/public/js/form.js"></script>
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>

</body>

</html>
