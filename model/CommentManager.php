<?php

require_once('model/Manager.php');


class CommentManager extends Manager
{

    public function getComments($postsId)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE posts_id = ? AND signaled IN (0, 2) ORDER BY comment_date DESC');
        $comments->execute(array($postsId));
        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $db = $this->dbConnect();
        $comments = $db->prepare('INSERT INTO comments (posts_id, author, comment_content, comment_date, signaled)VALUES(?,?,?, now(),0)');
        $affectedLines = $comments->execute(array($_GET['id'], $_POST['author'], $_POST['comment']));
        return $affectedLines;
    }

    public function deleteComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE id=?');
        $req->execute(array($commentId));
    }

    public function deleteComments($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM comments WHERE posts_id=?');
        $req->execute(array($postId));
    }

    public function signalComment($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signaled=1 WHERE id= :thisCommentId And signaled=0');
        $req->execute(array(
            'thisCommentId' => $commentId
        ));
    }

    public function getSignaledComments()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE signaled=1 ORDER BY comment_date DESC');
        return $req;
    }

    public function signaledCommentValidation($commentId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE comments SET signaled=2 WHERE id= :thisCommentId');
        $req->execute(array(
            'thisCommentId' => $commentId
        ));
    }

    public function commentsCount($postId)
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_number FROM comments WHERE signaled IN (0, 2) AND posts_id=' . $postId);
        $totalComments = $req->fetch();
        return $totalComments['total_number'];

    }

    public function signaledCommentsCount()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT COUNT(*) AS total_signaled FROM comments WHERE signaled = 1');
        $totalSignaled = $req->fetch();
        return $totalSignaled['total_signaled'];
    }
}
