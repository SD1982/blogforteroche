<?php
session_start();
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
          
        elseif($_GET['action']=='signalComment'){
            if (isset($_GET['id']) && $_GET['id'] > 0) {
                commentSignal($_GET['id']);
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
        
        elseif($_GET['action']=='login'){
            if (isset($_POST['pseudo']) && $_POST['pseudo']=="forteroche"){
                if (isset($_POST['pass']) && $_POST['pass']=="motdepass"){
                    $_SESSION['pseudo']='forteroche';
                    adminListPosts();
                }
            }
            else {
                 throw new Exception('Vous avez fait une erreur dans l\'un des champs demandés !');
               }
        }
        
        elseif($_GET['action']=='unlog'){
            if($_SESSION['pseudo']='forteroche'){
                session_destroy();
                listposts();
            }
            
        }
        
        elseif($_GET['action']=='manage'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                    admincomment();
            }    
            else {
                throw new Exception('Aucun identifiant de billet envoyé');
            }
        }
        
          elseif($_GET['action']=='moderateComments'){
             if($_SESSION['pseudo']='forteroche'){
                adminListSignaledComment();
            } 
        }
        
        elseif($_GET['action']=='createPost'){
            if($_SESSION['pseudo']='forteroche'){
                if(isset($_POST['title']) && $_POST['content']){
                    if(!empty($_POST['title']) && !empty($_POST['content'])){
                        adminCreatePost($_POST['title'], $_POST['content']);
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
        
        elseif($_GET['action']=='deleteComment'){
            if($_SESSION['pseudo']='forteroche'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                adminDeleteComment($_GET['id']);
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
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
        
        elseif($_GET['action']=='deleteComment'){
            if($_SESSION['pseudo']='forteroche'){
            if(isset($_GET['id']) && $_GET['id'] > 0){
                adminDeleteComment($_GET['id']);
                }
            }
            else {
                throw new Exception('Aucun identifiant de commentaire envoyé');
            }
        }
    }
    
     else {
          if(isset($_SESSION['pseudo']) && $_SESSION['pseudo']=='forteroche'){
                adminListPosts();
            }
         else{
             listPosts();
         }     
    }
}
catch(Exception $e) { 
    echo 'Erreur : ' . $e->getMessage();
}
