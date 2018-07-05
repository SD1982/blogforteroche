<?php
class PostManager
{
    
   public function getPosts()
   {
     
    $db = dbConnect();
    $req = $db->query('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    
    return $req;
   }
    public function getPost($postsId)
    {
    
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
     $req->execute(array($postsId));
     $post = $req->fetch();
    
    return $post;
    }
    private function dbConnect()
    {
        $db=new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
}
