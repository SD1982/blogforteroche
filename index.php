<?php

require('controller/frontend.php');
require('controller/backend.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts') {
                listposts();  
        }
     
        elseif ($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0)  {
                post();    
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif ($_GET['action'] == 'addComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif($_GET['action']== 'login') {
            adminLogin();
        }
        
        elseif($_GET['action']=='verify'){
            if (isset($_POST['pseudo']) && $_POST['pseudo']=="forteroche"){
                if (isset($_POST['pass']) && $_POST['pass']==""){
                    adminListPosts();
                }
            }
            else {
                 throw new Exception('Vous avez fait une erreur dans l\'un des champs demandés !');
               }
        }
        
        elseif($_GET['action']=='manage'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                    adminPost();
            }    
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif($_GET['action']=='deletePost'){
              if(isset($_GET['id']) && $_GET['id'] > 0){
                    adminDeletePost($_GET['id']);
            } 
        }
        elseif($_GET['action']=='deleteComment'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                adminDeleteComment($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        
        elseif($_GET['action']=='updatePost'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                adminUpdatePost($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
    }
     else {
            listPosts();
        }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
