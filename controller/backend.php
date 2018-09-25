<?php 

require_once('model/PostManager.php');
require_once('model/CommentManager.php');
require_once('model/MembersManager.php');



function adminListPosts()
{
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function adminPost()
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    $totalComments = $commentManager->commentsCount($_GET['id']);
    require('view/backend/postView.php');
}

function adminCreatePost()
{
    $postManager = new PostManager();
    $post = $postManager->createPost($_POST['title'], $_POST['content']);
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    header('Location: index.php?action=adminListPosts');
}

function adminPostUpdate($postId, $postTitle, $postContent)
{
    $postManager = new PostManager();
    $post = $postManager->updatePost($_GET['id'], $_POST['title'], $_POST['content']);
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function adminDeletePost($postId)
{
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->deletePost($_GET['id']);
    $comments = $commentManager->deleteComments($_GET['id']);
    $postManager = new PostManager();
    $posts = $postManager->getPosts();
    require('view/backend/listPostsView.php');
}

function adminAddComment($postId, $author, $comment)
{
    $commentManager = new CommentManager();
    $affectedLines = $commentManager->postComment($postId, $author, $comment);
    if ($affectedLines === false) {
        die('Impossible d\'ajouter le commentaire !');
    } elseif ($_SESSION['pseudo'] = 'forteroche') {
        header('Location: index.php?action=adminPost&id=' . $postId);
    }
}

function adminDeleteComment($commentId, $postId)
{
    $commentManager = new CommentManager();
    $comment = $commentManager->deleteComment($_GET['id']);
    $postManager = new PostManager();
    $commentManager = new CommentManager();
    $post = $postManager->getPost($_GET['id']);
    $comments = $commentManager->getComments($_GET['id']);
    header('Location: index.php?action=adminPost&id=' . $postId);
}

function adminListSignaledComment()
{
    $commentManager = new CommentManager();
    $signaledComments = $commentManager->getSignaledComments();
    $totalSignaled = $commentManager->signaledCommentsCount();
    require('view/backend/signaledCommentsView.php');


}

function adminValidateSignaledComment($commentId)
{
    $commentManager = new CommentManager();
    $validateSignaledComment = $commentManager->signaledCommentValidation($_GET['id']);
    header('Location: index.php?action=moderateComments');
}
/* pour futur espace membre
function createAccount($userPseudo, $hashedPass)
{
    $membermanager = new MembersManager();
    $newMember = $membermanager->createUsersAccount($userPseudo, $hashedPass);
    header('Location: index.php');

}
 */
function checkAdminPassword()
{
    $membermanager = new MembersManager();
    $adminPassword = $membermanager->checkAdminPassword();
    $isPasswordCorrect = password_verify($_POST['pass'], $adminPassword);
    if (!$adminPassword) {
        die('Mauvais pseudo ou mdp');
    } else {
        $_SESSION['pseudo'] = 'forteroche';
        header('Location: index.php?action=adminListPosts');
    }

}
