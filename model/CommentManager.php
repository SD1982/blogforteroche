<?php

require_once('model/Manager.php');

class CommentManager extends Manager{
    
    public function getComments($postsId){
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date DESC');
    $comments->execute(array($postsId));
    return $comments;
    }
   
    public function postComment($postId, $author, $comment){
    $db = $this->dbConnect();
    $comments = $db->prepare('INSERT INTO comments (posts_id, author, comment_content, comment_date, signaled)VALUES(?,?,?, now(),0)');
    $affectedLines = $comments->execute(array($_GET['id'], $_POST['author'], $_POST['comment']));
    return $affectedLines;
    }
    
    public function signalComment($commentId){
    $db = $this->dbConnect();
    $req= $db->prepare('UPDATE comments SET signaled=1 WHERE id= :thisCommentId');
    $req->execute(array(
        'thisCommentId'=>$commentId
    ));
    }
    
    public function getSignaledComments(){
    $db = $this->dbConnect();
    $req = $db->query('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signaled=1 ORDER BY comment_date DESC');
    return $req;
    }
    
    public function signaledCommentValidation($commentId){
    $db = $this->dbConnect();
    $req= $db->prepare('UPDATE comments SET signaled=0 WHERE id= :thisCommentId');
    $req->execute(array(
        'thisCommentId'=>$commentId
    ));
    }
}
