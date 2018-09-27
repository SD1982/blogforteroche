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
    <link href="public/css/style.css" rel="stylesheet" />
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
    <!-- menu -->
    <nav class="navbar navbar-expand-md navbar-dark bg-dark fixed-top">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item active">
                    <a class="btn btn-info" href="index.php?action=adminListPosts">Accueil</a>
                </li>
                <li>
                    <button data-toggle="modal" data-backdrop="false" href="#createPost" class="btn btn-success">Ajouter un article</button>
                </li>
                <li>
                    <a class="btn btn-warning" href='index.php?action=moderateComments'>Commentaires signalés</a>
                </li>
                <li>
                    <a class="btn btn-danger" class="button" href='index.php?action=unlog'>Déconnexion</a>
                </li>
            </ul>
        </div>
    </nav>
    <!-- contenu du site -->
    <main role="main" class="container">
        <!-- titre du site  -->
        <div class="starter-template">
            <div class="siteTitle">
                <h1>
                    <?= $title ?>
                </h1>
            </div>
        </div>
        <!-- fenetre modal de creation d'article -->
        <div class="container">
            <div class="modal fade" id="createPost">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <button type="button" class="close" data-dismiss="modal">x</button>
                        </div>
                        <div class="modal-body">
                            <form action="index.php?action=createPost" method="post">
                                <div>
                                    <label for="title">Titre de votre article</label><br />
                                    <input type="text" class="form-control" name="title" placeholder="Votre Titre ici">
                                </div>
                                <br/>
                                <div>
                                    <h3>Contenu de votre article</h3>
                                    <br />
                                    <textarea class="form-control" name="content"></textarea>
                                    <br/>
                                </div>
                                <div>
                                    <label for="title">Url de votre miniature</label><br />
                                    <input type="text" class="form-control" name="miniature" placeholder="l'url de votre miniature ici">
                                    <br/>
                                </div>
                                <div>
                                    <label for="title">Url de votre image</label><br />
                                    <input type="text" class="form-control" name="image" placeholder="l'url de votre image ici">
                                    <br/>
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
        <!-- contenu du site -->
        <?= $content ?>
    </main>
<!--footer -->
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
<!--script -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.0/umd/popper.min.js" integrity="sha384-cs/chFZiN24E4KMATLdqdvsezGxaGsi4hLGOzlXwp5UZB1LY//20VyM2taTB4QvJ" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.0/js/bootstrap.min.js" integrity="sha384-uefMccjFJAIv6A+rW+L4AHf99KvxDjWSu1z9VI8SKNVmz4sk7buKt/6v9KI65qnm" crossorigin="anonymous"></script>
    <script src="public/js/tinymce/tinymce.min.js"></script>
    <script>
        tinymce.init({
            selector: 'textarea',
        });
    </script>

</body>

</html>
