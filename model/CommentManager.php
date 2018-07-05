<?php

require_once('model/Manager.php');

class CommentManager extends Manager{
    
    public function getComments($postsId){
    $db = $this->dbConnect();
    $comments = $db->prepare('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date');
    $comments->execute(array($postsId));
    return $comments;
    }

    public function postComment($postsId, $author, $comment){
    $db= $this->dbConnect();
    $comments= $db->prepare('INSERT INTO comments(posts_id, author, comment_content, comment_date)VALUES(?, ?, ?, now())');
    $affectedlines=$comments->execute(array($postsId, $author, $comment));
    return $affectedlines;
    }

}
