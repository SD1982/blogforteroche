<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try {
//redirection vers la liste des articles coté utilisateur
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
            listposts();
//redirection vers la liste des articles coté admin
        } elseif ($_GET['action'] == 'adminListPosts') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                adminListposts();
            } else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
//redirection vers un article
        } elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                post();
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
//redirection vers un article coté admin
        } elseif ($_GET['action'] == 'adminPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if ($_SESSION['pseudo'] == 'forteroche') {
                    adminPost();
                } else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }

        /* en vue d'un espace membre
        elseif($_GET['action']=='createAccount'){
            if(!empty($_POST['pseudo'])&& !empty($_POST['password'])){
                if($_POST['password'] == $_POST['passwordCheck']){
                    $userPseudo = htmlspecialchars($_POST['pseudo']);
                    $hashedPass = password_hash($_POST['password'], PASSWORD_BCRYPT);
                    createAccount($userPseudo, $hashedPass); 
                }
                else{
                    throw new Exception('les mot de pass ne sont pas identiques');
                }
                       
            }
            else {
                throw new Exception('Vous devez remplir tout les champs demandés !');
            }
        }
         */
//verification du mot de pass de l'admin lors du login
        elseif ($_GET['action'] == 'adminPasswordCheck') {
            if (isset($_POST['pseudo']) && $_POST['pseudo'] == "forteroche") {
                if (isset($_POST['pass']) && ($_POST['pass'] == $_POST['passwordCheck']));
                checkAdminPassword($_POST['pass']);
            } else {
                throw new Exception('Tous les champs ne sont pas remplis !');
            }
//deconnexion de l'admin
        } elseif ($_GET['action'] == 'unlog') {
            if ($_SESSION['pseudo'] = 'forteroche') {
                session_destroy();
                lastpost();
            }
//ajout d'un commentaire sur un article coté utilisateur
        } elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], htmlspecialchars($_POST['author']), htmlspecialchars($_POST['comment']));
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
//ajout d'un commentaire sur un article coté admin
        } elseif ($_GET['action'] == 'adminAddComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    adminAddComment($_GET['id'], $_POST['author'], $_POST['comment']);
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
//signalement d'un commentaire par un utilisateur
        } elseif ($_GET['action'] == 'signalComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentSignal($_GET['id'], $_GET['idPost']);
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
//redirection vers la gestion des commentaire coté admin
        } elseif ($_GET['action'] == 'moderateComments') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                adminListSignaledComment();
            } else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
//suppression d'un commentaire
        } elseif ($_GET['action'] == 'deleteComment') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (isset($_GET['idPost']) && $_GET['idPost'] > 0) {
                        adminDeleteComment($_GET['id'], $_GET['idPost']);
                    } else {
                        throw new Exception('Aucun identifiant de post envoyé');
                    }
                } else {
                    throw new Exception('Aucun identifiant de commentaire envoyé');
                }
            } else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
//suppression d'un commentaire signalé
        } elseif ($_GET['action'] == 'deleteSignaledComment') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    adminDeleteSignaledComment($_GET['id']);
                    header('Location: index.php?action=moderateComments');
                } else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
//validation d'un commentaire signalé
        } elseif ($_GET['action'] == 'validateSignaledComment') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    adminValidateSignaledComment($_GET['id']);
                } else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            } else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
//creation d'un nouvel article
        } elseif ($_GET['action'] == 'createPost') {
            if ($_SESSION['pseudo'] == 'forteroche') {
                if (isset($_POST['title']) && $_POST['content']) {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        adminCreatePost(htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']), htmlspecialchars($_POST['url_miniature']), htmlspecialchars($_POST['url_image']));
                    }
                } else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            } else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
//modification d'un article existant
        } elseif ($_GET['action'] == 'postUpdate') {
            if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'forteroche') {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    if (!empty($_POST['title']) && !empty($_POST['content'])) {
                        adminPostUpdate($_GET['id'], htmlspecialchars($_POST['title']), htmlspecialchars($_POST['content']));
                    } else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
            }
//suppression d'un article
        } elseif ($_GET['action'] == 'deletePost') {
            if (isset($_POST['pseudo']) && $_POST['pseudo'] == "forteroche") {
                if (isset($_GET['id']) && $_GET['id'] > 0) {
                    adminDeletePost($_GET['id']);
                } else {
                    throw new Exception('Aucun identifiant de billet envoyé');
                }
            }
        }
//sans parametre dans l'url le site redirige vers la page des derniers article
    } else {
        lastPost();
    }
//affichage des messages d'erreurs
} catch (Exception $e) {
    if (isset($_SESSION['pseudo']) && $_SESSION['pseudo'] == 'forteroche') {
        $errorMessage = $e->getMessage();
        require('view/backend/errorView.php');
    } else {
        $errorMessage = $e->getMessage();
        require('view/frontend/errorView.php');
    }
}
