<?php
session_start();
require('controller/frontend.php');
require('controller/backend.php');

try { 
    if (isset($_GET['action'])) {
        if ($_GET['action'] == 'listPosts'){
                listposts();       
        }
        
        elseif($_GET['action'] == 'adminListPosts'){
              if($_SESSION['pseudo']=='forteroche'){
                adminListposts();       
            }
            else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
        }
        
        elseif($_GET['action'] == 'post') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
                    post();
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif($_GET['action'] == 'adminPost') {
            if (isset($_GET['id']) && $_GET['id'] > 0){
             if($_SESSION['pseudo']=='forteroche'){
                adminPost();       
                }
                else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
        elseif($_GET['action']=='login'){
            if (isset($_POST['pseudo']) && $_POST['pseudo']=="forteroche"){
                if (isset($_POST['pass']) && $_POST['pass']=="motdepass"){
                    if($_SESSION['pseudo']='forteroche'){
                    adminListPosts();
                   }
                   else {
                        throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
                }
            }
            else {
                 throw new Exception('Vous avez fait une erreur dans l\'un des champs demandés !');
               }
        }
        
        elseif($_GET['action']=='unlog'){
            if($_SESSION['pseudo']='forteroche'){
                session_destroy();
                lastpost();
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
        
            elseif ($_GET['action'] == 'adminAddComment') {
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                if (!empty($_POST['author']) && !empty($_POST['comment'])) {
                    adminAddComment($_GET['id'], $_POST['author'], $_POST['comment']);
                }
                else {
                    throw new Exception('Tous les champs ne sont pas remplis !');
                }
            }
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
            
        }
        
        elseif($_GET['action']=='signalComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentSignal($_GET['id'], $_GET['idPost']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
                
        elseif($_GET['action']=='moderateComments'){
             if($_SESSION['pseudo']=='forteroche'){
                adminListSignaledComment();
            }
            else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
        }
        
        elseif($_GET['action']=='deleteComment'){
            if($_SESSION['pseudo']=='forteroche'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    if(isset($_GET['idPost']) && $_GET['idPost'] > 0){
                        adminDeleteComment($_GET['id'], $_GET['idPost']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de post envoyé');
                        }  
                    }
                    else {
                        throw new Exception('Aucun identifiant de commentaire envoyé');
                        }
            }
            else {
                throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
            }
        }
        
        elseif($_GET['action']=='deleteSignaledComment'){
            if($_SESSION['pseudo']=='forteroche'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    adminDeleteComment($_GET['id']);
                }
                else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        
        elseif($_GET['action']=='validateSignaledComment'){
            if($_SESSION['pseudo']=='forteroche'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    adminValidateSignaledComment($_GET['id']);
                }
                else {
                    throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        
        elseif($_GET['action']=='createPost'){
            if($_SESSION['pseudo']=='forteroche'){
                if(isset($_POST['title']) && $_POST['content']){
                    if(!empty($_POST['title']) && !empty($_POST['content'])){
                        adminCreatePost($_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Vous devez etre admin et connecté pour accéder a cette page');
                    }
                }
            }  
        }
        
        elseif($_GET['action']=='postUpdate'){
            if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']=='forteroche'){
                if(isset($_GET['id']) && $_GET['id'] > 0){
                    if(!empty($_POST['title']) && !empty($_POST['content'])){
                        adminPostUpdate($_GET['id'], $_POST['title'], $_POST['content']);
                    }
                    else {
                        throw new Exception('Tous les champs ne sont pas remplis !');
                    }
                }
            } 
        }
        
        elseif($_GET['action']=='deletePost'){
            if (isset($_POST['pseudo']) && $_POST['pseudo']=="forteroche"){
                if (isset($_POST['pass']) && $_POST['pass']=="motdepass"){
                    if(isset($_GET['id']) && $_GET['id'] > 0){
                        adminDeletePost($_GET['id']);
                    }
                    else {
                        throw new Exception('Aucun identifiant de billet envoyé');
                    }
                }
                 else {
                    throw new Exception('Vous avez fait une erreur dans l\'un des champs demandés !');
                 }
            }
        }
    }
    else {
       lastPost();
    }           
}
catch(Exception $e) { 
    if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']=='forteroche'){
        $errorMessage=$e->getMessage();
        require('view/backend/errorView.php');
    }
    else{
        $errorMessage=$e->getMessage();
        require('view/frontend/errorView.php');
    }   
}
