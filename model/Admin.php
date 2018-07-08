<?php

require_once('model/Manager.php');

class Admin extends Manager{
    
	public function createPost($postTitle, $postContent){
        $db = $this->dbConnect();
		$req = $db->prepare ('INSERT INTO posts(title, posts_content, creation_date) VALUES(?, ?, NOW())');
		$this->request($sql, array($postTitle, $postContent));
	}
    
	public function deletePost($postId){
        $db = $this->dbConnect();
		$req = $db->prepare ('DELETE FROM posts WHERE id = ?');
		$this->request($sql, array($postId));
	}
    
	public function updatePost($postTitle, $postContent,$postId){
        $db = $this->dbConnect();
		$req = $db->prepare ('UPDATE posts SET title=?, posts_content=?, WHERE id=?');
		$this->request($sql, array($postTitle, $postContent,$postId));
	}
    
    public function deleteComment($commentId){
        $db = $this->dbConnect();
		$req = $db->prepare ('DELETE FROM comments WHERE POST_ID = ?');
		$this->request($sql, array($commentId));
	}
    
    public function deleteComments($postId){
        $db = $this->dbConnect();
		$req = $db->prepare ('DELETE * FROM comments WHERE POST_ID = ?');
		$this->request($sql, array($postId));
	}
    
}
