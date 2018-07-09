<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/AdminManager.php');

function adminLogin(){
    require('view/frontend/logView.php');
}

function adminCheckId(){
    
}

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

function adminCreatePost($postTitle, $postContent){
    $adminManager=new AdminManager();

	}
    
function adminUpdatePost($postId){
    $adminManager=new AdminManager();
    $post = $adminManager->updatePost($_GET['id']); 
    require('view/backend/updatePostView.php');
}

function adminDeletePost($postId){
    $adminManager=new AdminManager();
    $post = $adminManager->deletePost($_GET['id']);
    $comments=$adminManager->deleteComments($_GET['id']);
	}
    

function adminDeleteComment($commentId){
    $adminManager=new AdminManager();
    $comment=$adminManager->deleteComment($_GET['id']);
	}
