<?php

require_once("model/Manager.php");


class PostManager extends Manager
{

    public function createPost($postTitle, $postContent, $postMiniature, $postImage)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('INSERT INTO posts(title, posts_content, url_miniature, url_image, creation_date) VALUES(?, ?, ?, ?, NOW())');
        $req->execute(array($postTitle, $postContent, $postMiniature, $postImage));
    }


    public function updatePost($postId, $postTitle, $postContent, $postMiniature, $postImage)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('UPDATE posts SET title= :newTitle, posts_content= :newContent, url_miniature= :newMiniature, url_image= :newImage  WHERE id= :thisPostId');
        $req->execute(array(
            'thisPostId' => $postId,
            'newTitle' => $postTitle,
            'newContent' => $postContent,
            'newMiniature' => $postMiniature,
            'newImage' => $postImage
        ));
    }

    public function deletePost($postId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('DELETE FROM posts WHERE id = ?');
        $req->execute(array($postId));
    }

    public function getPosts()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, posts_content, url_image, url_miniature, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC ');
        return $req;
    }

    public function getPost($postsId)
    {
        $db = $this->dbConnect();
        $req = $db->prepare('SELECT id, title, posts_content, url_image, url_miniature, DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts WHERE id = ?');
        $req->execute(array($postsId));
        $post = $req->fetch();
        return $post;
    }

    public function lastPost()
    {
        $db = $this->dbConnect();
        $req = $db->query('SELECT id, title, posts_content, url_image, url_miniature,  DATE_FORMAT(creation_date, \'%d/%m/%Y\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 3');
        return $req;
    }

}
