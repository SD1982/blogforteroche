<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');



function adminListPosts(){
    $postManager=new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function adminPost(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/backend/postView.php');
}

function adminComment(){
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    require('view/backend/commentView.php');
}

function adminCreatePost(){
    $adminManager=new AdminManager();
    $post = $adminManager->createPost($_POST['title'], $_POST['content']);
    $postManager=new PostManager();
    $posts = $postManager->getPosts();
    header('Location: index.php?action=adminListPosts');
}
    
function adminPostUpdate($postId, $postTitle, $postContent){
   $adminManager=new AdminManager();
   $post = $adminManager->updatePost($_GET['id'], $_POST['title'], $_POST['content']);
   $postManager=new PostManager();
   $posts = $postManager->getPosts();
   require('view/backend/listPostsView.php');
}

function adminDeletePost($postId){
    $adminManager=new AdminManager();
    $post = $adminManager->deletePost($_GET['id']);
    $comments=$adminManager->deleteComments($_GET['id']);
    $postManager=new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}
    

function adminDeleteComment($commentId){
    $adminManager=new AdminManager();
    $comment=$adminManager->deleteComment($_GET['id']);
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    header('Location: index.php?action=moderateComments');
}

function adminListSignaledComment(){
    $commentManager = new CommentManager();
    $signaledComments = $commentManager->getSignaledComments();
    require('view/backend/signaledCommentsView.php');
    
}

function adminValidateSignaledComment($commentId){
    $commentManager = new CommentManager();
    $validateSignaledComment = $commentManager->signaledCommentValidation($_GET['id']); 
    header('Location: index.php?action=moderateComments');
}
