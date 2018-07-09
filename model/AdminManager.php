<?php

require_once('model/Manager.php');

class AdminManager extends Manager{
    
    protected function checkLogin($membersPseudo, $memberspass, $membersRole){
        $db = $this->dbConnect();
        $adminId= $db->prepare('SELECT pseudo, pass, role FROM members');
        $req->execute(array($membersPseudo, $memberspass, $membersRole));
    }
    
	public function createPost($postTitle, $postContent){
        $db = $this->dbConnect();
		$req = $db->prepare ('INSERT INTO posts(title, posts_content, creation_date) VALUES(?, ?, NOW())');
		$req->execute(array($postTitle, $postContent));
	}
    
	public function deletePost($postId){
        $db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
	}
    
	public function updatePost($postId){
        $db = $this->dbConnect();
		$req = $db->prepare('SELECT title, posts_content FROM posts WHERE id = ?');
		$req->execute(array($postId));
        $post = $req->fetch();
        return $post;
	}
    
    public function deleteComment($commentId){
        $db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id= ?');
        $req->execute(array($commentId));
	}
    
    public function deleteComments($postId){
        $db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE posts_id= ?');
        $req->execute(array($postId));
	}
    
}
