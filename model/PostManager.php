<?php

require_once("model/Manager.php");

class PostManager extends Manager{
    
   public function getPosts(){ 
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
   }
    
   public function getPost($postsId){
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postsId));
        $post = $req->fetch();
        return $post;
    }
    
   public function resumePosts(){
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, substr(posts_content, 1, 1500), DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
        return $req;
    }
    
}
