<?php

require_once('model/Manager.php');

class AdminManager extends Manager{
    
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
    
    public function updatePost($postId, $postTitle, $postContent){
        $db = $this->dbConnect();
		$req = $db->prepare('UPDATE posts SET title= :newTitle, posts_content= :newContent WHERE id= :thisPostId');
        $req->execute(array(
            'newTitle'=>$postTitle,
            'newContent'=>$postContent,
            'thisPostId'=>$postId
        ));
    }
    
    public function deleteComment($commentId){
        $db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE id=?');
        $req->execute(array($commentId));
	}
    
    public function deleteComments($postId){
        $db = $this->dbConnect();
		$req = $db->prepare('DELETE FROM comments WHERE posts_id=?');
        $req->execute(array($postId));
	}
    
}
