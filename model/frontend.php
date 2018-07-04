<?php

function getPosts()
{
     
    $db = dbConnect();
    $req = $db->query('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
    
    return $req;
}

function getPost($postsId)
{
    
    $db = dbConnect();
    $req = $db->prepare('SELECT id, title, posts_content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE id = ?');
     $req->execute(array($postsId));
     $post = $req->fetch();
    
    return $post;
}

function getComments($postsId)
{
    
    $db = dbConnect();
    $comments = $db->prepare('SELECT id, author, comment_content, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE posts_id = ? ORDER BY comment_date');
    $comments->execute(array($postsId));

    return $comments;
}

function dbConnect()
{
    try
    {
        $db = new PDO('mysql:host=localhost;dbname=blog;charset=utf8', 'root', '');
        return $db;
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }
}
